@extends('layouts.default')
@section('content')
        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#power" aria-controls="power" role="tab" data-toggle="tab">Leistung</a></li>
                <li role="presentation"><a href="#energy" aria-controls="energy" role="tab" data-toggle="tab">Energie</a></li>
                <li role="presentation"><a href="#dcInput" aria-controls="dcInput" role="tab" data-toggle="tab">DC Input</a></li>
                <li role="presentation"><a href="#acOutput" aria-controls="acOutput" role="tab" data-toggle="tab">AC Output</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="power">Graph Leistung</div>
                <div role="tabpanel" class="tab-pane" id="energy">Graph Energie</div>
                <div role="tabpanel" class="tab-pane" id="dcInput">Graph DC Input</div>
                <div role="tabpanel" class="tab-pane" id="acOutput">Graph AC Output</div>
            </div>
        </div>
<!-- /container -->
@stop