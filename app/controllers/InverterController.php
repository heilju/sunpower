<?php

use Carbon\Carbon;


class InverterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inverter = new Inverter();
		$inverterLatestData = $inverter->getLatestData();
		$inverterMaxData = $inverter->getMaxData();

		$data = array(
			'inverterLatestData' => $inverterLatestData,
			'inverterMaxData' => $inverterMaxData,
		);

		return View::make('inverter.index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Form to manually create data rows

		 return View::make('inverter.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$inverter = new Inverter;
		$inverter->acOutputCurrentL1 = Input::get('acOutputCurrentL1');
		$inverter->acOutputCurrentL2 = Input::get('acOutputCurrentL2');
		$inverter->acOutputCurrentL3 = Input::get('acOutputCurrentL3');
		$inverter->acOutputPowerL1 = Input::get('acOutputPowerL1');
		$inverter->acOutputPowerL2 = Input::get('acOutputPowerL2');
		$inverter->acOutputPowerL3 = Input::get('acOutputPowerL3');
		$inverter->acOutputPowerTotal = Input::get('acOutputPowerTotal');
		$inverter->acOutputEnergyDaily = Input::get('acOutputEnergyDaily');
		$inverter->acOutputEnergyTotal = Input::get('acOutputEnergyTotal');
		$inverter->dcInputCurrentS1 = Input::get('dcInputCurrentS1');
		$inverter->dcInputVoltageS1 = Input::get('dcInputVoltageS1');
		$inverter->dcInputCurrentS2 = Input::get('dcInputCurrentS2');
		$inverter->dcInputVoltageS2 = Input::get('dcInputVoltageS2');
		$inverter->dcInputCurrentS3 = Input::get('dcInputCurrentS3');
		$inverter->dcInputVoltageS3 = Input::get('dcInputVoltageS3');
		$inverter->save();


		return Redirect::to('inverter');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
