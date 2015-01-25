<?php
/**
 * Created by PhpStorm.
 * User: heilju
 * Date: 30.12.14
 * Time: 13:00
 */


use Carbon\Carbon;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

class Inverter extends Eloquent {

    protected $table = 'values';

    // Allow the following properties to be mass fillable
    protected $fillable = array(
        'dcInputCurrentS1',
        'dcInputCurrentS2',
        'dcInputCurrentS3',
        'dcInputVoltageS1',
        'dcInputVoltageS2',
        'dcInputVoltageS3',
        'acOutputVoltageL1',
        'acOutputVoltageL2',
        'acOutputVoltageL3',
        'acOutputPowerL1',
        'acOutputPowerL2',
        'acOutputPowerL3',
        'acOutputPowerTotal',
        'acOutputEnergyDaily',
        'acOutputEnergyTotal',
    );

    protected $dcInputCurrentS1;
    protected $dcInputCurrentS2;
    protected $dcInputCurrentS3;
    protected $dcInputVoltageS1;
    protected $dcInputVoltageS2;
    protected $dcInputVoltageS3;
    protected $acOutputVoltageL1;
    protected $acOutputVoltageL2;
    protected $acOutputVoltageL3;
    protected $acOutputPowerL1;
    protected $acOutputPowerL2;
    protected $acOutputPowerL3;
    protected $acOutputPowerTotal;
    protected $acOutputEnergyDaily;
    protected $acOutputEnergyTotal;


    public function connectInverter()
    {
        // create instance of Guzzle HTTP client and send request. URL and HTTP basic auth details are read from config file
        $client = new GuzzleClient();
        $res = $client->get(Config::get('sunpower.pvInverterUrl'), ['auth' =>  [Config::get('sunpower.pvInverterUser'), Config::get('sunpower.pvInverterPwd')]]);

        // return GuzzleClient response object
        return $res;
    }


    public function checkInverterState()
    {
        // set xpath config value for property pvState
        $xPathNodes = array_dot(Config::get('sunpower.xPathNodes'));
        $xPathPvState = $xPathNodes['pvState.xPath'];

        // create DomCrawler object, connect to inverter and get response
        $crawler = new Crawler((string) $this->connectInverter()->getBody());

        // here we get the value for the operation mode of the inverter which is displayed on the UI
        $inverterState = trim($crawler->filterXPath($xPathPvState)->text());

        // return false for state "Aus" and true for every other state
        if($inverterState != "Aus")
        {
            // return true for every other state then off
            return true;
        }
        else
        {
            return false;
        }
    }


    public function queryInverterUI($inverterState)
    {
        // initialize array for current values which will be scraped from inverter UI
        $inverterValues = array();

        // create instance of DomCrawler. Body of HTTP request needs to be casted to string
        $crawler = new Crawler((string) $this->connectInverter()->getBody());

        // When state is true query inverter and get all values
        if($inverterState)
        {
            // loop through xpath config and assign values to properties
            foreach(Config::get('sunpower.xPathNodes') as $property => $config)
            {
                Log::debug("Scraping value for property " . $property . " from xpath " . $config['xPath']);
                ${$property} = $crawler->filterXPath($config['xPath']);

                Log::debug("Setting property " . $property . " to value " . trim(${$property}->text()));
                $inverterValues = array_add($inverterValues, $property, trim(${$property}->text()));
            }
        }
        // when state is false (=inverter is off) get values for acOutputEnergyTotal and acOutputEnergyDaily and set all other values to 0
        else
        {
            // get config array for xpath strings of all properties
            $xPathNodes = Config::get('sunpower.xPathNodes');

            // flatten config array so we can later can dot notation
            $xPathNodes = array_dot($xPathNodes);

            // loop through config array
            foreach($xPathNodes as $node => $xpath)
            {
                // get property name by splitting array_dot key names (e.g. acOutputEnergyTotal.xpath)
                $keyDotNotation = explode('.', $node);
                $propertyName = $keyDotNotation[0];

                // when inverter is off only acOutputEnergyTotal and acOutputEnergyDaily display proper values.
                if($propertyName == "acOutputEnergyTotal" || $propertyName == "acOutputEnergyDaily")
                {
                    // Here we scrape their values and add them to the return array.
                    $value = $crawler->filterXPath($xPathNodes[$node])->text();
                    $inverterValues = array_add($inverterValues, $propertyName, trim($value));

                    Log::debug(__CLASS__ . ' > ' . __FUNCTION__ . ': Setting ' . $propertyName . ' to ' . $value);
                }
                else
                {
                    // inverter shows "x x x" as values meaning 0. Set all properties to 0
                    $inverterValues = array_add($inverterValues, $propertyName, 0);

                    Log::debug(__CLASS__ . ' > ' . __FUNCTION__ . ': Setting ' . $propertyName . ' to 0.');
                }
            }
        }

        return $inverterValues;
    }

    public function queryInverterHistoryFile()
    {
        // get last records from inverter history file and return them to the controller
    }

    public function getMaxData($maxValuesConfig = NULL)
    {
        $now = Carbon::now()->toDateTimeString();

        // Initializing date variables
        $yesterday = Carbon::now()->subDay()->toDateTimeString();
        $oneWeekAgo = Carbon::now()->subWeek()->toDateTimeString();
        $oneMonthAgo = Carbon::now()->subMonth()->toDateTimeString();
        $oneYearAgo = Carbon::now()->subYear()->toDateTimeString();

        Log::debug('Query for property acOutputPowerTotalMaxDay between ' . $yesterday . ' and ' . $now);

        // Initialize array for returning data to controller
        $maxData = array();

        // Loop through config option maxValues and return array
        foreach($maxValuesConfig as $property => $config)
        {
            Log::debug('Creating max value array for property: ' . $property);

            foreach($config as $interval)
            {
                Log::debug('Processing interval ' . $interval);

                switch ($interval)
                {
                    case 'alltime':
                        $keyMaxAlltime = $property . "Max";
                        $valueMaxAlltime = $this::max($property);
                        Log::debug('Key: ' . $keyMaxAlltime . ', Value: ' . $valueMaxAlltime);
                        $maxData = array_add($maxData, $keyMaxAlltime, $valueMaxAlltime);
                        break;

                    case 'day':
                        $keyMaxDay = $property . "MaxDay";
                        $valueMaxDay = $this::whereBetween('created_at', array($yesterday,$now))->max($property);
                        Log::debug('Key: ' . $keyMaxDay . ', Value: ' . $valueMaxDay);
                        $maxData = array_add($maxData, $keyMaxDay, $valueMaxDay);
                        break;

                    case 'week':
                        $keyMaxWeek = $property . "MaxWeek";
                        $valueMaxWeek = $this::whereBetween('created_at', array($oneWeekAgo,$now))->max($property);
                        Log::debug('Key: ' . $keyMaxWeek . ', Value: ' . $valueMaxWeek);
                        $maxData = array_add($maxData, $keyMaxWeek, $valueMaxWeek);
                        break;

                    case 'month':
                        $keyMaxMonth = $property . "MaxMonth";
                        $valueMaxMonth = $this::whereBetween('created_at', array($oneMonthAgo,$now))->max($property);
                        Log::debug('Key: ' . $keyMaxMonth . ', Value: ' . $valueMaxMonth);
                        $maxData = array_add($maxData, $keyMaxMonth, $valueMaxMonth);
                        break;

                    case 'year':
                        $keyMaxYear = $property . "MaxYear";
                        $valueMaxYear = $this::whereBetween('created_at', array($oneYearAgo,$now))->max($property);
                        Log::debug('Key: ' . $keyMaxYear . ', Value: ' . $valueMaxYear);
                        $maxData = array_add($maxData, $keyMaxYear, $valueMaxYear);
                        break;
                }
            }
        }

        return $maxData;
    }


}