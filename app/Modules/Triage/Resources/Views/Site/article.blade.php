@extends('visittransfer::site._layout')

@section('content')
    <div class="row">
        <div class="col-md-12 hidden-xs" id="searchBox">
            @include("triage::site.partials._searchbar")

            <div class="col-md-12">
                {!! HTML::panelOpen($article->title, ["type" => "vuk", "key" => "letter-".strtolower($article->title[0])]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            @if($alternatives->count() > 0)
                                <strong>There are {{ $alternatives->count() }} alternative possible articles.</strong>
                                {!! link_to_route("triage.search", "Click here to view them.", ["query" => Input::get("query")]) !!}
                            @else
                                {!! link_to_route("triage.search", "Click here to go back.", ["query" => Input::get("query")]) !!}
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2>{{ $article->title }}</h2>
                        {!! nl2br($article->content) !!}
                    </div>

                    <div class="col-md-4">
                        <div class="col-md-12 text-center">
                            <p>
                                Did you find this article useful?
                            </p>
                            <p>
                                {!! ButtonGroup::withContents([
                                    Button::success("Yes")->small()->asLinkTo(route("triage.article.helpful", [$article->id])),
                                    Button::danger("No")->small()->asLinkTo(route("triage.article.unhelpful", [$article->id])),
                                ]) !!}
                            </p>
                        </div>
                        <a href="{{ route("triage.start") }}">

                            <div class="row text-center">
                                <div class="col-md-2">
                                    {!! HTML::img("icon_chat_head", "png", "64") !!}
                                </div>

                                <div class="col-md-10" style="height: 64px; padding-top: 10px; font-size: 22pt;">
                                    Need more help? Contact us &rang;
                                </div>
                            </div>
                        </a>
                    </div>
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
