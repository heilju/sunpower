<?php

use Carbon\Carbon;

class GraphController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$xAxis = 'created_at';

		switch($id)
		{
			case 'power':

				$yAxis = 'acOutputPowerTotal';
				break;

			case 'energy':

				$yAxis = 'acOutputEnergyDaily';
				break;

			default:

				$yAxis = 'acOutputPowerTotal';
				break;
		}

		// Initializing date variables
		$now = Carbon::now();
		$yesterday = Carbon::now()->subDay();
		$weekAgo = Carbon::now()->subWeek();
		$monthAgo = Carbon::now()->subMonth();

		$dayGraph = new Graph();
		$dayGraphValues = $dayGraph->getGraphData($xAxis, $yAxis, $yesterday, $now);
		Log::debug('Day graph has ' . count($dayGraphValues) . ' data points.');

		$weekGraph = new Graph();
		$weekGraphValues = $weekGraph->getGraphData($xAxis, $yAxis, $weekAgo, $now);
		Log::debug('Week graph has ' . count($weekGraphValues) . ' data points.');

		$monthGraph = new Graph();
		$monthGraphValues = $monthGraph->getGraphData($xAxis, $yAxis, $monthAgo, $now);
		Log::debug('Month graph has ' . count($monthGraphValues) . ' data points.');

		$graphJson = array(
			'day' => json_encode($dayGraphValues),
			'week' => json_encode($weekGraphValues),
			'month' => json_encode($monthGraphValues),
		);

		return View::make('graph.index')->with('graphJson',$graphJson);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
