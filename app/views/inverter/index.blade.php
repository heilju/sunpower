@extends('layouts.default')
@section('content')
<div class="container">
    <div class="header">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation">{{ HTML::link('http://sunpower.meema.lan/inverter', 'Overview')}}</li>
                <li role="presentation">{{ HTML::link('#', 'Graphs')}}</li>
                <li role="presentation">{{ HTML::link('http://sunpower.meema.lan/inverter/create', 'Create')}}</li>
            </ul>
        </nav>
        <h3 class="text-muted">Sonnenkraftwerk Weindlweg 16</h3>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><strong>Leistung</strong></div>

                <!-- Current output value -->
                <p class="text-center mee-output-current">{{ $inverterLatestData->acOutputPowerTotal }} W</p>
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
                        <td>{{ $inverterMaxData['acOutputPowerTotalMax'] }} W</td>
                        <td>{{ $inverterMaxData['acOutputPowerTotalMaxDay'] }}  W</td>
                        <td>{{ $inverterMaxData['acOutputPowerTotalMaxWeek'] }} W</td>
                        <td>{{ $inverterMaxData['acOutputPowerTotalMaxMonth'] }} W</td>
                        <td>{{ $inverterMaxData['acOutputPowerTotalMaxYear'] }} W</td>
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
                <p class="text-center mee-output-daily">{{ $inverterLatestData->acOutputEnergyDaily }} kWh</p>
                <table class="table">
                    <tr>
                        <td>Gesamt</td>
                        <td>Woche</td>
                        <td>Monat</td>
                        <td>Jahr</td>
                    </tr>
                    <tr>
                        <td>{{ $inverterMaxData['acOutputEnergyDailyMax'] }} kWh</td>
                        <td>{{ $inverterMaxData['acOutputEnergyDailyMaxWeek'] }}  kWh</td>
                        <td>{{ $inverterMaxData['acOutputEnergyDailyMaxMonth'] }}  kWh</td>
                        <td>{{ $inverterMaxData['acOutputEnergyDailyMaxYear'] }}  kWh</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- AC Output-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Gesamtenergie</strong></div>
                <p class="text-center mee-output-total">{{ $inverterLatestData->acOutputEnergyTotal }} kWh</p>
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
                        <td>{{ $inverterLatestData->dcInputVoltageS1 }} V</td>
                        <td>{{ $inverterLatestData->dcInputCurrentS1 }} A</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ $inverterLatestData->dcInputVoltageS2 }} V</td>
                        <td>{{ $inverterLatestData->dcInputCurrentS2 }} W</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ $inverterLatestData->dcInputVoltageS3 }} V</td>
                        <td>{{ $inverterLatestData->dcInputCurrentS3 }} W</td>
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
                        <td>{{ $inverterLatestData->acOutputCurrentL1 }} V</td>
                        <td>{{ $inverterLatestData->acOutputPowerL1 }} W</td>
                    </tr>
                    <tr>
                        <td>L2</td>
                        <td>{{ $inverterLatestData->acOutputCurrentL2 }} V</td>
                        <td>{{ $inverterLatestData->acOutputPowerL2 }} W</td>
                    </tr>
                    <tr>
                        <td>L3</td>
                        <td>{{ $inverterLatestData->acOutputCurrentL3 }} V</td>
                        <td>{{ $inverterLatestData->acOutputPowerL3 }} W</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; meema.org 2014</p>
    </footer>

</div>
@stop