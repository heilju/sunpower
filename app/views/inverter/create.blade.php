@extends('layouts.default')
@section('content')
<div class="container">
    <div class="header">
        <h1>Create new data row</h1>
    </div>
    <div class="row">
        {{ Form::open(array('url' => 'inverter')) }}
        <div class="col-lg-6">
            {{ Form::label('dcInputCurrentS1', 'DC Input Current (String 1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputCurrentS1', '6.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputCurrentS2', 'DC Input Current (String 2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputCurrentS2', '0.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputCurrentS3', 'DC Input Current (String 3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputCurrentS3', '0.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputVoltageS1', 'DC Input Voltage (String 1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputVoltageS1', '433.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputVoltageS2', 'DC Input Voltage (String 2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputVoltageS2', '0.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('dcInputVoltageS3', 'DC Input Voltage (String 3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('dcInputVoltageS3', '0.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputCurrentL1', 'AC Output Current (L1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputCurrentL1', '1.70') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputCurrentL2', 'AC Output Current (L2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputCurrentL2', '1.80') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputCurrentL3', 'AC Output Current (L3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputCurrentL3', '1.90') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerL1', 'AC Output Power (L1): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerL1', '498.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerL2', 'AC Output Power (L2): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerL2', '499.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerL3', 'AC Output Power (L3): ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerL3', '500.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputPowerTotal', 'AC Output Power Total: ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputPowerTotal', '2567.00') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputEnergyDaily', 'AC Output Energy Daily: ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputEnergyDaily', '23.77') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('acOutputEnergyTotal', 'AC Output Energy Total: ') }}
        </div>
        <div class="col-lg-6">
            {{ Form::text('acOutputEnergyTotal', '2267.00') }}
        </div>
        <div class="col-lg-6">

        </div>
        <div class="col-lg-6">
            {{ Form::submit('Datenreihe erzeugen') }}
        </div>
        {{ Form::close() }}
    </div>
    <footer class="footer">
        <p>&copy; meema.org 2014</p>
    </footer>
</div>
@stop