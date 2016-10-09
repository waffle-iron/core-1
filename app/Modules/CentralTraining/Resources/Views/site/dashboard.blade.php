@extends('centraltraining::site._layout')

@section('content')
    <div class="row">
        <div class="col-md-12 hidden-xs">
            {!! HTML::panelOpen("ATC Training", ["type" => "vuk", "key" => "letter-a"]) !!}

            <!-- Content Of Panel [START] -->
            <!-- Top Row [START] -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <p>
                        Blah blah blah, ATC Training. This is the dashboard.  We've no idea what to display here, yet.
                    </p>
                </div>

            </div>

            {!! HTML::panelClose() !!}
        </div>
    </div>
@stop

@section("scripts")
    @parent
@stop
