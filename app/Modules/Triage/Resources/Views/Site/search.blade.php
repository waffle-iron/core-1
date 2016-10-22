@extends('visittransfer::site._layout')

@section('content')
    <div class="row">
        <div class="col-md-12 hidden-xs" id="searchBox">
            @include("triage::site.partials._searchbar")

            <div class="col-md-12">
            {!! HTML::panelOpen("Your results...", ["type" => "vuk", "key" => "letter-r"]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <strong>Total Results - {{ $results->count() }}: </strong> All results are displayed below.
                        </div>
                    </div>

                    @foreach($results as $result)
                        <a href="{{ route("triage.article", [$result->id, "query" => Input::get("query", "")]) }}">
                            <div class="col-md-10 col-md-offset-1" style="background-color: #F1EBE9; margin-bottom: 10px; color: #000000;">
                                <h2>{{ $result->title }}</h2>
                                <p>{{ str_limit(strip_tags($result->content), 200, "...") }}</p>
                                <p class="text-right">
                                    <strong>Category:</strong> {{ $result->category->name }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

            {!! HTML::panelClose() !!}
            </div>
        </div>
    </div>
@stop

@section("scripts")
    @parent

    {{--<script type="text/javascript">--}}
        {{--var tour = new Tour({--}}
            {{--name: "Triage-System",--}}
            {{--steps: [--}}
                    {{--@if($pendingReferences->count() > 0)--}}
                    {{--{--}}
                        {{--element: "#pendingReferences",--}}
                        {{--title: "Pending References",--}}
                        {{--content: "You have pending references that require completion here.  This list will be updated automatically.",--}}
                        {{--backdrop: true,--}}
                        {{--placement: "top"--}}
                    {{--},--}}
                {{--@endif--}}

                {{--@if($allApplications->count() > 0)--}}
                    {{--{--}}
                        {{--element: "#applicationHistory",--}}
                        {{--title: "Application History",--}}
                        {{--content: "You can view any open, or historic, applications here.",--}}
                        {{--backdrop: true,--}}
                        {{--placement: "top"--}}
                    {{--},--}}
                {{--@endif--}}

                {{--@can("create", new \App\Modules\Visittransfer\Models\Application)--}}
                    {{--{--}}
                        {{--element: "#visitingBoxes",--}}
                        {{--title: "Visiting the UK",--}}
                        {{--content: "If you wish to visit with your Controller rating or to gain a pilot rating, you should visit the UK.",--}}
                        {{--backdrop: true,--}}
                        {{--placement: "top"--}}
                    {{--},--}}
                    {{--{--}}
                        {{--element: "#transferringAtcBox",--}}
                        {{--title: "Transferring ATC",--}}
                        {{--content: "If you wish to transfer to the UK as a controller, start your application here.",--}}
                        {{--backdrop: true,--}}
                        {{--placement: "top"--}}
                    {{--},--}}
                {{--@endcan--}}
            {{--]--}}
        {{--});--}}

        {{--tour.init();--}}
        {{--tour.start();--}}
    {{--</script>--}}
@stop
