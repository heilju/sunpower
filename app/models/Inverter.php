<?php
/**
 * Created by PhpStorm.
 * User: heilju
 * Date: 30.12.14
 * Time: 13:00
 */

use Carbon\Carbon;

class Inverter extends Eloquent {

    protected $table = 'values';


    protected $dcInputCurrentS1;
    protected $dcInputCurrentS2;
    protected $dcInputCurrentS3;
    protected $dcInputVoltageS1;
    protected $dcInputVoltageS2;
    protected $dcInputVoltageS3;
    protected $acOutputCurrentL1;
    protected $acOutputCurrentL2;
    protected $acOutputCurrentL3;
    protected $acOutputPowerL1;
    protected $acOutputPowerL2;
    protected $acOutputPowerL3;
    protected $acOutputPowerTotal;
    protected $acOutputEnergyDaily;
    protected $acOutputEnergyTotal;

    protected $acOutputPowerTotalMax;
    protected $acOutputPowerTotalMaxDay;
    protected $acOutputPowerTotalMaxWeek;
    protected $acOutputPowerTotalMaxMonth;
    protected $acOutputPowerTotalMaxYear;
    protected $acOutputEnergyDailyMax;


    public function getLatestData()
    {
        return $this::orderBy('created_at', 'DESC')->first();
    }

    public function getMaxData()
    {
        $now = Carbon::now()->toDateTimeString();
        $yesterday = Carbon::now()->subDay()->toDateTimeString();
        $oneWeekAgo = Carbon::now()->subWeek()->toDateTimeString();
        $oneMonthAgo = Carbon::now()->subMonth()->toDateTimeString();
        $oneYearAgo = Carbon::now()->subYear()->toDateTimeString();

        $this->acOutputEnergyDailyMax = $this::max('acOutputEnergyDaily');


        $maxData = array(
            'acOutputPowerTotalMax' => $this::max('acOutputPowerTotal'),
            'acOutputPowerTotalMaxDay' => $this::whereBetween('created_at', array($yesterday,$now))->max('acOutputPowerTotal'),
            'acOutputPowerTotalMaxWeek' => $this::whereBetween('created_at', array($oneWeekAgo,$now))->max('acOutputPowerTotal'),
            'acOutputPowerTotalMaxMonth' => $this::whereBetween('created_at', array($oneMonthAgo,$now))->max('acOutputPowerTotal'),
            'acOutputPowerTotalMaxYear' => $this::whereBetween('created_at', array($oneYearAgo,$now))->max('acOutputPowerTotal'),
            'acOutputEnergyDailyMax' => $this::max('acOutputEnergyDaily'),
            'acOutputEnergyDailyMaxWeek' => $this::whereBetween('created_at', array($oneWeekAgo,$now))->max('acOutputEnergyDaily'),
            'acOutputEnergyDailyMaxMonth' => $this::whereBetween('created_at', array($oneMonthAgo,$now))->max('acOutputEnergyDaily'),
            'acOutputEnergyDailyMaxYear' => $this::whereBetween('created_at', array($oneYearAgo,$now))->max('acOutputEnergyDaily'),
        );

        return $maxData;
    }
}