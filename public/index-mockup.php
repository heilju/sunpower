<!doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="header">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="#">Overview</a></li>
                <li role="presentation"><a href="#">Graphs</a></li>
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
                <p class="text-center mee-output-current">3.447 W</p>
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
                        <td>5.134 W</td>
                        <td>2.133 W</td>
                        <td>2.170 W</td>
                        <td>3.345 W</td>
                        <td>5.134 W</td>
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
                <p class="text-center mee-output-daily">22.5 kWh</p>
                <table class="table">
                    <tr>
                        <td>Gesamt</td>
                        <td>Woche</td>
                        <td>Monat</td>
                        <td>Jahr</td>
                    </tr>
                    <tr>
                        <td>34.9 kWh</td>
                        <td>22.5 kWh</td>
                        <td>27.7 kWh</td>
                        <td>32.6 kWh</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- AC Output-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Gesamtenergie</strong></div>
                <p class="text-center mee-output-total">2.235 kWh</p>
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
                        <td>400 V</td>
                        <td>10 A</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>0 V</td>
                        <td>0 W</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>0 V</td>
                        <td>0 W</td>
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
                        <td>50 V</td>
                        <td>120 W</td>
                    </tr>
                    <tr>
                        <td>L2</td>
                        <td>210 V</td>
                        <td>440 W</td>
                    </tr>
                    <tr>
                        <td>L3</td>
                        <td>122 V</td>
                        <td>320 W</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; meema.org 2014</p>
    </footer>

</div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>