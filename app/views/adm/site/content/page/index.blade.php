@extends('adm.layout')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header">
                <div class="box-title">Search Criteria</div>
            </div>
            <div class="box-body">

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title ">
                    Search Results
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div align="center">
                    {{ $pages->links() }}
                </div>
                <table id="mship-accounts" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">
                                @if($sortBy == "account_id")
                                    @if($sortDir == "ASC")
                                        {{ link_to_route("adm.site.content.page.index", "ID", ["sort_by" => "content_id", "sort_dir" => "DESC"]) }}
                                        <small><i class="ion ion-arrow-up-b"></i></small>
                                    @else
                                        {{ link_to_route("adm.site.content.page.index", "ID", ["sort_by" => "content_id", "sort_dir" => "ASC"]) }}
                                        <small><i class="ion ion-arrow-down-b"></i></small>
                                    @endif
                                @else
                                    {{ link_to_route("adm.site.content.page.index", "ID", ["sort_by" => "content_id", "sort_dir" => "ASC"]) }}
                                @endif
                            </th>
                            <th class="col-md-3">
                                @if($sortBy == "title")
                                    @if($sortDir == "ASC")
                                        {{ link_to_route("adm.site.content.page.index", "Title", ["sort_by" => "title", "sort_dir" => "DESC"]) }}
                                        <small><i class="ion ion-arrow-up-b"></i></small>
                                    @else
                                        {{ link_to_route("adm.site.content.page.index", "Title", ["sort_by" => "title", "sort_dir" => "ASC"]) }}
                                        <small><i class="ion ion-arrow-down-b"></i></small>
                                    @endif
                                @else
                                    {{ link_to_route("adm.site.content.page.index", "Title", ["sort_by" => "title", "sort_dir" => "ASC"]) }}
                                @endif
                            </th>
                            <th>Slug</th>
                            <th>Sections</th>
                            <th>Status</th>
                            <th>Default?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $p)
                        <tr>
                            <td>{{ link_to_route('adm.site.content.page.detail', $p->content_id, [$p->content_id]) }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->slug }}</td>
                            <td>
                                @foreach($p->sections as $ps)
                                    {{ $ps->title }}<br />
                                @endforeach
                            </td>
                            <td>DEFAULT</td>
                            <td>STATUS</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div align="center">
                    {{ $pages->links() }}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
@stop

@section('scripts')
@parent
{{ HTML::script('/assets/js/plugins/datatables/dataTables.bootstrap.js') }}
@stop