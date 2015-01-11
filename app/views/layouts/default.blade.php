<!doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jumbotron-narrow.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="header">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="http://d-sunpower.meema.lan/inverter">Overview</a></li>
                <li role="presentation"><a href="http://d-sunpower.meema.lan/inverter/create">Create</a></li>
                <li role="presentation"><a href="http://d-sunpower.meema.lan/inverter/graph">Graphs</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Sunpower - Weindlweg 16</h3>
    </div>

@yield('content')

    <footer class="footer">
        <p>&copy; meema.org 2014</p>
    </footer>

</div>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>