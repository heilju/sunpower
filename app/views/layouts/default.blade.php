<!doctype html>
<html>
<head>
@section('html_head')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sunpower</title>
    <script src="{{ Config::get('sunpower.baseUrl') }}/js/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dygraph/1.1.0/dygraph-combined.js"></script>
    <link href="{{ Config::get('sunpower.baseUrl') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ Config::get('sunpower.baseUrl') }}/css/jumbotron-narrow.css" rel="stylesheet">
@show
</head>
<body>
    <div class="container">
@section('content_nav')
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ Config::get('sunpower.baseUrl') }}">{{ HTML::image('pics/sunpower_logo.png', 'alt', array('height' => 25)) }}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ Config::get('sunpower.baseUrl') }}/inverter">Überblick</a></li>
                        <li><a href="{{ Config::get('sunpower.baseUrl') }}/inverter/create">Werte abfragen</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Graphen <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ Config::get('sunpower.baseUrl') }}/graph/power">Leistung</a></li>
                                <li><a href="{{ Config::get('sunpower.baseUrl') }}/graph/energy">Energie</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
@show

@yield('content_body')

@section('content_footer')
        <footer class="footer">
            <p>&copy; meema.org 2014</p>
        </footer>
        </div>
@show

@section('content_scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ Config::get('sunpower.baseUrl') }}/js/bootstrap.min.js"></script>
@show
    </body>
</html>