<?php

use Carbon\Carbon;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

class InverterController extends \BaseController {

	protected $inverterValues = NULL;

	/**
	 * Display the overview page including last values and max values.
	 *
	 * @return Illuminate\View\View
	 */
	public function index()
	{
		$inverterLatestData = DB::table('values')->orderBy('created_at', 'DESC')->first();

		// retrieve maximum values from database
		$inverter = new Inverter();
		$inverterMaxData = $inverter->getMaxData(Config::get('sunpower.maxValues'));

		// merge latest data record and max values
		$inverterValues = array_merge($inverterMaxData, get_object_vars($inverterLatestData));

		return View::make('inverter.index')->with('inverterValues',$inverterValues);
	}


	/**
	 * Action responsible for creating the user form for submitting values.
	 *
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		// get user agent for decision making regarding data store function
		$userAgent = Request::header('User-Agent');
		Log::debug('Request containing User-Agent: ' . $userAgent);

		// create instance of Inverter
		$inverter = new Inverter;

		// get inverter operation state
		$inverterState = $inverter->checkInverterState();

		// If true inverter is on. Inverter can be queried for data
		$inverterValues = $inverter->queryInverterUI($inverterState);

		if ($userAgent == Config::get('sunpower.scriptingUserAgent'))
		{
			Log::debug('Request came from curl script. Directly storing inverter values without returning the user to the create view.');
			$this->store($inverterValues);
		}
		else
		{
			Log::debug('Returning user to create view for submitting inverter values');
			return View::make('inverter.create')->with('inverterValues', $inverterValues);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param	array	$inverterValues 	Array containing the inverter values to store.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store($inverterValues = array())
	{
		if($inverterValues == NULL)
		{
			Log::debug('No array with inverter values provided. Reading from request input fields.');
			$inverter = new Inverter(Input::all());
		}
		else
		{
			Log::debug('Got array with inverter Values.');
			$inverter = new Inverter($inverterValues);
		}

		$inverter->save();

		return Redirect::to('inverter');
	}
}
