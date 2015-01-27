<?php

use Carbon\Carbon;

class GraphController extends \BaseController {

	/**
	 * Display the graphs for the specified value type.
	 *
	 * @param  string	$yAxis		The value type for which graphs should be displayed
	 *
	 * @return Illuminate\View\View
	 */
	public function show($yAxis)
	{
		$xAxis = 'created_at';

		switch($yAxis)
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
}
