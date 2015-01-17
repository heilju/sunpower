@extends('layouts.default')

@section('content_body')
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="http://d-sunpower.meema.lan/graph/power">Leistung</a></li>
            <li role="presentation"><a href="http://d-sunpower.meema.lan/graph/energy">Energie</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><strong>Tag</strong></div>
            <div id="dayGraph" style="width:100%;"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><strong>Woche</strong></div>
            <div id="weekGraph" style="width:100%;"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><strong>Monat</strong></div>
            <div id="monthGraph" style="width:100%;"></div>
        </div>
    </div>
</div>
@stop

@section('content_scripts')
    @parent
    <!-- dygraph -->
    <script type="text/javascript">
        var chartDataDayJson = <?php echo $graphJson['day']; ?>;
        var chartDataWeekJson = <?php echo $graphJson['week']; ?>;
        var chartDataMonthJson = <?php echo $graphJson['month']; ?>;
        var data = [];

        function toDygraphData(json)
        {
            data.length = 0;

            for(var item in json)
            {
                //console.log("timestamp: " + timestamp + ", " + "Value: " + value);
                var timestamp = new Date(json[item][0] * 1000);
                var value = json[item][1];

                if (value > 0)
                {
                    //console.log("Adding data point to array: X:" + timestamp + ", " + "Y:" + value);
                    data[data.length] = [timestamp, value];
                }
            }

            console.log('Returning ' + data.length + ' data points.');

            return data;
        }

        console.log('Got ' + chartDataDayJson.length + ' data points for day graph.');

        dayG = new Dygraph(
                // containing div
                document.getElementById("dayGraph"),
                toDygraphData(chartDataDayJson),
                {
                    labels: ['Date', 'Value'],
                    fillGraph: true,
                    axes: {
                        x: {
                            valueFormatter: Dygraph.dateString_,
                            axisLabelFormatter: Dygraph.dateAxisFormatter,
                            ticker: Dygraph.dateTicker,
                        }
                    }
                }
        );

        console.log('Day graph plotted using ' + data.length + ' data points');

        console.log('Got ' + chartDataWeekJson.length + ' data points for week graph.');

        weekG = new Dygraph(
                // containing div
                document.getElementById("weekGraph"),

                toDygraphData(chartDataWeekJson),
                {
                    labels: ['Date', 'Value'],
                    fillGraph: true,
                    axes: {
                        x: {
                            valueFormatter: Dygraph.dateString_,
                            axisLabelFormatter: Dygraph.dateAxisFormatter,
                            ticker: Dygraph.dateTicker,
                        }
                    }
                }
        );

        console.log('Week graph plotted using ' + data.length + ' data points');

        console.log('Got ' + chartDataMonthJson.length + ' data points for month graph.');

        monthG = new Dygraph(
                // containing div
                document.getElementById("monthGraph"),

                toDygraphData(chartDataMonthJson),
                {
                    labels: ['Date', 'Value'],
                    fillGraph: true,
                    axes: {
                        x: {
                            valueFormatter: Dygraph.dateString_,
                            axisLabelFormatter: Dygraph.dateAxisFormatter,
                            ticker: Dygraph.dateTicker,
                        }
                    }
                }
        );

        console.log('Month graph plotted using ' + data.length + ' data points');
    </script>
@stop