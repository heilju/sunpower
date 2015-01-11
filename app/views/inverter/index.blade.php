@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><strong>Leistung</strong></div>

                <!-- Current output value -->
                <p class="text-center mee-output-current">{{ $inverterValues['acOutputPowerTotal'] }} W</p>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <td>Gesamt</td>
                        <td>Tag</td>
                        <td>Woche</td>
                        <td>Monat</td>
                        <td>Jahr</td>
                    </tr>
                    <tr>
                        <td>{{ $inverterValues['acOutputPowerTotalMax'] }} W</td>
                        <td>{{ $inverterValues['acOutputPowerTotalMaxDay'] }}  W</td>
                        <td>{{ $inverterValues['acOutputPowerTotalMaxWeek'] }} W</td>
                        <td>{{ $inverterValues['acOutputPowerTotalMaxMonth'] }} W</td>
                        <td>{{ $inverterValues['acOutputPowerTotalMaxYear'] }} W</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- DC output -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Tagesenergie</strong></div>
                <p class="text-center mee-output-daily">{{ $inverterValues['acOutputEnergyDaily'] }} kWh</p>
                <table class="table">
                    <tr>
                        <td>Gesamt</td>
                        <td>Woche</td>
                        <td>Monat</td>
                        <td>Jahr</td>
                    </tr>
                    <tr>
                        <td>{{ $inverterValues['acOutputEnergyDailyMax'] }} kWh</td>
                        <td>{{ $inverterValues['acOutputEnergyDailyMaxWeek'] }}  kWh</td>
                        <td>{{ $inverterValues['acOutputEnergyDailyMaxMonth'] }}  kWh</td>
                        <td>{{ $inverterValues['acOutputEnergyDailyMaxYear'] }}  kWh</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- AC Output-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Gesamtenergie</strong></div>
                <p class="text-center mee-output-total">{{ $inverterValues['acOutputEnergyTotal'] }} kWh</p>
                <table class="table">
                    <tr>
                        <td>Sekunden</td>
                        <td>Minuten</td>
                        <td>Stunden</td>
                        <td>Tage</td>
                    </tr>
                    <tr>
                        <td>6.887</td>
                        <td>887</td>
                        <td>119</td>
                        <td>6</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- DC output -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>DC Input</strong></div>

                <table class="table">
                    <tr>
                        <td>String</td>
                        <td>Spannung</td>
                        <td>Strom</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>{{ $inverterValues['dcInputVoltageS1'] }} V</td>
                        <td>{{ $inverterValues['dcInputCurrentS1'] }} A</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $inverterValues['dcInputVoltageS2'] }} V</td>
                        <td>{{ $inverterValues['dcInputCurrentS2'] }} W</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $inverterValues['dcInputVoltageS3'] }} V</td>
                        <td>{{ $inverterValues['dcInputCurrentS3'] }} W</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- AC Output-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>AC Output</strong></div>
                <table class="table">
                    <tr>
                        <td>Phase</td>
                        <td>Spannung</td>
                        <td>Leistung</td>
                    </tr>
                    <tr>
                        <td>L1</td>
                        <td>{{ $inverterValues['acOutputVoltageL1'] }} V</td>
                        <td>{{ $inverterValues['acOutputPowerL1'] }} W</td>
                    </tr>
                    <tr>
                        <td>L2</td>
                        <td>{{ $inverterValues['acOutputVoltageL2'] }} V</td>
                        <td>{{ $inverterValues['acOutputPowerL2'] }} W</td>
                    </tr>
                    <tr>
                        <td>L3</td>
                        <td>{{ $inverterValues['acOutputVoltageL3'] }} V</td>
                        <td>{{ $inverterValues['acOutputPowerL3'] }} W</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@stop