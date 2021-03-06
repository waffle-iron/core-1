@extends('visittransfer::site.application._layout')

@section('vt-content')
    <div class="row" id="submissionHelp">
        <div class="col-md-12">
            {!! HTML::panelOpen("Submission", ["type" => "fa", "key" => "tick"]) !!}
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <p>

                    </p>

                </div>

                {!! Form::horizontal(["route" => ["visiting.application.submit.post", $application->public_id], "method" => "POST"]) !!}
                    <div class="col-md-9 col-md-offset-1 text-center">
                        {!! ControlGroup::generate(
                            Form::label("submission_terms", "I confirm that the details within this application are correct to the best of my ability and that my application will be rejected if any details are inaccurate&nbsp;&nbsp;"),
                            Form::checkbox("submission_terms", true, false)
                        ) !!}
                    </div>

                    <div class="col-md-6 col-md-offset-3 text-center">
                        {!! Button::success("SUBMIT APPLICATION")->submit() !!}
                    </div>
                {!! Form::close() !!}

            </div>
            {!! HTML::panelClose() !!}
        </div>
    </div>
@stop
