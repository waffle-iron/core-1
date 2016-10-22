<div class="col-md-12 hidden-xs">
{!! Form::open(['route' => 'triage.search', 'method' => 'post']) !!}
{!! HTML::panelOpen("Save time, try these first...", ["type" => "vuk", "key" => "letter-s"]) !!}
<!-- Content Of Panel [START] -->
    <!-- Top Row [START] -->
    <div class="row">
        <div class="col-md-10">
            {!! InputGroup::withContents(Form::text('query', Input::get("query", ""), ['placeholder' => 'Search VATSIM UK Help']))->large()->withAttributes(['class' => 'col-md-12']) !!}
        </div>

        <div class="col-md-2">
            {!! Button::primary("Search")->large()->submit()->withAttributes(['class' => 'col-md-12']) !!}
        </div>

    </div>

    {!! HTML::panelClose() !!}
    {!! Form::close() !!}
</div>