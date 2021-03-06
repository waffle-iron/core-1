@extends('adm.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title ">
                        Create New Facility
                    </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if(isset($facility) && $facility->exists)
                        {!! Form::model($facility, ['route' => ['visiting.admin.facility.update.post', $facility->id]]) !!}
                    @else
                        {!! Form::open(["route" => "visiting.admin.facility.create.post"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-7">
                            {!! ControlGroup::generate(
                                Form::label('name', 'Name:'),
                                Form::text('name', Input::old("name", $facility->name))
                            ) !!}

                            {!! ControlGroup::generate(
                                Form::label('description', 'Description:'),
                                Form::textarea('description', Input::old("description", $facility->description), ["rows" => 9])
                            )->withAttributes(["style" => "margin-bottom: 25px;"]) !!}

                            {!! ControlGroup::generate(
                                    Form::label('training_team', 'Which team are they part of?'),
                                    Form::select("training_team", ['atc' => "ATC Training", "pilot" => "Pilot Training"], Input::old("training_team", $facility->training_team))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('can_visit', 'Can people VISIT this facility?'),
                                    Form::select("can_visit", ["1" => "YES", "0" => "NO"], Input::old("can_visit", $facility->can_visit))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('can_transfer', 'Can people TRANSFER TO this facility?'),
                                    Form::select("can_transfer", ["1" => "YES", "0" => "NO"], Input::old("can_transfer", $facility->can_transfer))
                            ) !!}
                        </div>
                        <div class="col-md-5">
                            {!! ControlGroup::generate(
                                    Form::label('training_required', 'Is training required?'),
                                    Form::select("training_required", [0 => "No", 1 => "Yes"], Input::old("training_required", $facility->training_required))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('training_spaces', 'How many training places are available?'),
                                    Form::select("training_spaces", array_merge([0,1,2,3,4,5,6,7,8,9,10], ["null" => "Infinite"]), Input::old("training_spaces", ($facility->training_spaces === null ? "null" : $facility->training_spaces)))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('stage_statement_enabled', 'Is a statement required?'),
                                    Form::select("stage_statement_enabled", [0 => "No", 1 => "Yes"], Input::old("stage_statement_enabled", $facility->stage_statement_enabled))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('stage_reference_enabled', 'Are references required?'),
                                    Form::select("stage_reference_enabled", [0 => "No", 1 => "Yes"], Input::old("stage_reference_enabled", $facility->stage_reference_enabled))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('stage_reference_quantity', 'How many references are required?'),
                                    Form::select("stage_reference_quantity", [0,1,2,3,4,5,6,7,8,9,10], Input::old("stage_reference_quantity", $facility->stage_reference_quantity))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('stage_checks', 'Do you want the automated checks to run?'),
                                    Form::select("stage_checks", [0 => "No", 1 => "Yes"], Input::old("stage_checks", $facility->stage_checks))
                            ) !!}

                            {!! ControlGroup::generate(
                                    Form::label('auto_acceptance', 'Automatically accept all applicants?'),
                                    Form::select("auto_acceptance", [0 => "No", 1 => "Yes"], Input::old("auto_acceptance", $facility->auto_acceptance))
                            ) !!}
                        </div>
                    </div>

                    <div class="btn-toolbar">
                        <div class="btn-group pull-right">
                            {!! Button::primary((isset($facility) && $facility->exists ? "Update" : "Create")." Facility")->submit() !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop

@section('scripts')
    @parent
    {!! HTML::script('/assets/js/plugins/datatables/dataTables.bootstrap.js') !!}
@stop