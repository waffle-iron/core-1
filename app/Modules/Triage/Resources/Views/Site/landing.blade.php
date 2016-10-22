@extends('visittransfer::site._layout')

@section('content')
    <div class="row">
        <div class="col-md-12 hidden-xs" id="searchBox">
            @include("triage::site.partials._searchbar")
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
