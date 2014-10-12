@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Filtrace
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function() {
        $("#function_id").select2({});
        $("#select_group").select2({});
        if(location.hash) {
            $('a[href=' + location.hash + ']').tab('show');
        }
        $(document.body).on("click", "a[data-toggle]", function(event) {
            location.hash = this.getAttribute("href");
        });
    });
    $(window).on('popstate', function() {
        var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
        $('a[href=' + anchor + ']').tab('show');
    });
</script>
@stop

{{-- Content --}}
@section('content')

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#profile-group" role="tab" data-toggle="tab">Profily skupin</a></li>
  <li><a href="#group" role="tab" data-toggle="tab">Skupiny</a></li>
  <li><a href="#add-group" role="tab" data-toggle="tab">Přidat skupinu</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade in active" id="profile-group" style="padding-top: 2em">
        {{ Form::open(['route' => ['adm.tools.grab.index'], 'method' => 'get', 'class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="input-group form-group">
            <span class="input-group-addon">Volba skupiny</span>
            {{ Form::select('select_group',$select_group, $get_select_group, ['id' => 'select_group', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
        </div>
        {{ Form::close() }}

        @if ($get_select_group > 0)
        {{ Form::open(['route' => ['adm.tools.grab.store'], 'class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-1">
                        {{ Form::selectRange('position', 1, 25, NULL, ['class'=> 'form-control'] ); }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::select('column_id',$select_column, NULL, ['required' => 'required','class'=> 'form-control']); }}
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                        <span class="input-group-addon">Funkce</span>
                        {{ Form::select('function_id',$select_function, NULL, ['id' => 'function_id','required' => 'required','class'=> 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-1">
                        {{ Form::submit('Přidat', ['name' => 'submit-insert-profile-column','class' => 'btn btn-success']) }}
                    </div>
                </div>
                <div class="row" style="margin-top: 1em">
                    <div class="col-md-3">
                        {{ Form::hidden('profile_id', $get_select_group)  }}
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Parametr 1</span>
                            {{ Form::text('val1', NULL, ["size" => "15", "maxlength" => "128",'class'=> 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Parametr 2</span>
                            {{ Form::text('val2', NULL, ["size" => "15", "maxlength" => "128",'class'=> 'form-control']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
        @endif

        @if (count($grab_db)>0)
        {{ Form::open(['route' => ['adm.tools.grab.store','select_group' => $get_select_group],'class' => 'form-horizontal', 'role' => 'form']) }}
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
            @foreach($grab_db as $row)
                <tr>
                    <td>{{ Form::checkbox("profile_checkbox[".$row->id."]") }}</td>
                    <td>{{ Form::selectRange('position['.$row->id.']', 0, 25, $row->position,['class'=> 'form-control']); }}</td>
                    <td>{{ Form::select('active['.$row->id.']', ["0" => "Neaktivní","1" => "Aktivní"] , $row->active,['class'=> 'form-control']) }}</td>
                    <td>{{ Form::select('column_id['.$row->id.']', $select_column , $row->column_id,['class'=> 'form-control']) }}</td>
                    <td>{{ $row->grabFunction->grabMode->alias }}</td>
                    <td>{{ $row->grabFunction->function }}</td>
                    <td>{{ Form::text('val1['.$row->id.']', $row->val1, ["size" => "15", "maxlength" => "128",'class'=> 'form-control']) }}</td>
                    <td>{{ Form::text('val2['.$row->id.']', $row->val2, ["size" => "15", "maxlength" => "128",'class'=> 'form-control']) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-center">{{ Form::submit('Uložit', ['name' => 'submit-update-profile','class' => 'btn btn-primary']) }}</td>
                    <td colspan="4" class="text-center">{{ Form::submit('Snazat označené', ['name' => 'submit-delete-profile','class' => 'btn btn-danger']) }}</td>
                </tr>
            </tfoot>
        </table>
        {{ Form::close() }}
        @endif
    </div>

    <div class="tab-pane fade" id="group" style="padding-top: 2em">
        <div class="col-md-8 col-md-offset-2">
            {{ Form::open(['route' => ['adm.tools.grab.store','#group'],'class' => 'form-horizontal', 'role' => 'form']) }}
            <table class="table table-striped table-bordered">
                <tbody>
                @foreach($grab_profile as $row)
                    <tr>
                        <td><input type="checkbox" name="checkbox[{{ $row->id }}]" /></td>
                        <td>{{ Form::select('active['.$row->id.']', ['0' => 'Nezobrazovat','1' => 'Zobrazovat'], $row->active,['class'=> 'form-control']) }}</td>
                        <td>{{ Form::text('charset['.$row->id.']', $row->charset, ["size" => "12", "maxlength" => "16","required" => "required",'class'=> 'form-control']) }}</td>
                        <td>{{ Form::text('name['.$row->id.']', $row->name, ["size" => "24", "maxlength" => "40","required" => "required",'class'=> 'form-control']) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-center">{{ Form::select('profile-action', ['0' => 'Žádná akce','1' => 'Smazat položku','2' => 'Klonovat položku'], NULL,['class'=> 'form-control']) }}</td>
                        <td colspan="1" class="text-center">{{ Form::submit('Provést zvolenou akci', ['name' => 'submit-profile-action','class' => 'btn btn-primary']) }}</td>
                    </tr>
                </tfoot>
            </table>
            {{ Form::close() }}
        </div>
    </div>

    <div class="tab-pane fade" id="add-group" style="padding-top: 2em">
        {{ Form::open(['route' => ['adm.tools.grab.store','#group'], 'class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="form-group">
            {{ Form::label('charset','Znaková sada',['class'=> 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                <input type="text" name="charset" size="24" maxlength="40" required = "required" class='form-control' name="" />
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('name','Název skupiny',['class'=> 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                <input type="text" name="name" size="24" maxlength="40" required = "required" class='form-control' name="" />
            </div>
        </div>
        <p class="text-center">
            {{ Form::submit('Přidat skupinu', ['name' => 'submit-add-group','class' => 'btn btn-success']) }}
        </p>
        {{ Form::close() }}
    </div>
</div>
@stop