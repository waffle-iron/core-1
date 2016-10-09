@extends('centraltraining::site._layout')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1 hidden-xs">
            {!! HTML::panelOpen("Starting your ATC Training", ["type" => "vuk", "key" => "letter-s"]) !!}

            <div class="row">
                <div class="row col-md-8 col-md-offset-2 text-center">
                    <p>
                        Thank you for your interest in embarking upon your ATC Training within the United Kingdom
                        division of VATSIM.
                        It is important that you understand how our Central training system works.
                        Here's some really important information on the two routes you can take.
                    </p>

                    <div class="col-md-6">
                        <h3>SEMINAR STUDY</h3>
                        <p>
                            This approach to training is where you attend a session at a pre-determined time.
                            Blah.
                        </p>
                    </div>

                    <div class="col-md-6">
                        <h3>SELF STUDY</h3>
                        <p>
                            This approach to training is where you study at your own pace.
                        </p>
                    </div>
                </div>

            </div>

            {!! HTML::panelClose() !!}
        </div>

        <div class="col-md-5 col-md-offset-1 hidden-xs">

            {!! HTML::panelOpen("Seminar Study", ["type" => "vuk", "key" => "letter-s"]) !!}

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p>
                        You should choose this route if you:
                    <ul>
                        <li>prefer to learn <strong>in groups</strong> in a <strong>visual and auditory manner</strong>
                        </li>
                        <li>are happy for your training speed to be <strong>dictated by the seminar schedule</strong>*
                        </li>
                    </ul>
                    <small>*You can switch to self-study training, at any time, to speed your training up.</small>
                    </p>
                </div>

            </div>

            <br/>

            <div class="row">
                <div class="col-xs-12 text-center">
                    {!! Button::success("REGISTER FOR SEMINAR STUDY")->asLinkTo(route("ct.profile.create", ["seminar"])) !!}
                </div>
            </div>

            {!! HTML::panelClose() !!}
        </div>

        <div class="col-md-5 hidden-xs">

            {!! HTML::panelOpen("Self Study", ["type" => "vuk", "key" => "letter-s"]) !!}

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p>
                        You should choose this route if you:
                    <ul>
                        <li>are happy to learn theoretical material <strong> on your own</strong></li>
                        <li>are sure that you <strong>do not</strong> wish to engage in seminars*</li>
                    </ul>
                    <small>*You <strong>cannot</strong> switch to Seminar study.</small>
                    </p>
                </div>

            </div>

            <br/>

            <div class="row">
                <div class="col-xs-12 text-center">
                    {!! Button::success("REGISTER FOR SELF STUDY")->asLinkTo(route("ct.profile.create", ["self"])) !!}
                </div>
            </div>

            {!! HTML::panelClose() !!}
        </div>
    </div>
@stop

@section("scripts")
    @parent
@stop
