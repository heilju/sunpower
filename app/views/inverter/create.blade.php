@extends('layouts.default')
@section('content_body')
    <div class="row">
        {{ Form::open(array('url' => 'inverter')) }}
        <div class="col-lg-6">
            {{ Form::label('dcInputCurrentS1', 'DC Input Current (String 1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputCurrentS1', $inverterValues['dcInputCurrentS1']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputCurrentS2', 'DC Input Current (String 2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputCurrentS2', $inverterValues['dcInputCurrentS2']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputCurrentS3', 'DC Input Current (String 3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputCurrentS3', $inverterValues['dcInputCurrentS3']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputVoltageS1', 'DC Input Voltage (String 1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputVoltageS1', $inverterValues['dcInputVoltageS1']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputVoltageS2', 'DC Input Voltage (String 2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputVoltageS2', $inverterValues['dcInputVoltageS2']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputVoltageS3', 'DC Input Voltage (String 3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputVoltageS3', $inverterValues['dcInputVoltageS3']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputVoltageL1', 'AC Output Voltage (L1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputVoltageL1', $inverterValues['acOutputVoltageL1']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputVoltageL2', 'AC Output Voltage (L2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputVoltageL2', $inverterValues['acOutputVoltageL2']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputVoltageL3', 'AC Output Voltage (L3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputVoltageL3', $inverterValues['acOutputVoltageL3']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerL1', 'AC Output Power (L1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerL1', $inverterValues['acOutputPowerL1']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerL2', 'AC Output Power (L2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerL2', $inverterValues['acOutputPowerL2']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerL3', 'AC Output Power (L3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerL3', $inverterValues['acOutputPowerL3']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerTotal', 'AC Output Power Total: ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerTotal', $inverterValues['acOutputPowerTotal']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputEnergyDaily', 'AC Output Energy Daily: ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputEnergyDaily', $inverterValues['acOutputEnergyDaily']) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputEnergyTotal', 'AC Output Energy Total: ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputEnergyTotal', $inverterValues['acOutputEnergyTotal']) }}
        </div>
        <div class="col-lg-6">

        </div>
        <div class="col-lg-6">
            {{ Form::submit('Datenreihe erzeugen') }}
        </div>
        {{ Form::close() }}
    </div>
@stop