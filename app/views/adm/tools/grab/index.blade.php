@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Filtrace
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
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
        {{ Form::open(array('route' => ['adm.tools.grab.index'], 'method' => 'get', 'class' => 'form-horizontal', 'role' => 'form')) }}
        <div class="input-group form-group">
            <span class="input-group-addon">Volba skupiny</span>
            {{ Form::select('select_group',$select_group, $get_select_group, array('id' => 'select_group', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
        </div>
        {{ Form::close() }}
            <table class="table table-striped table-bordered table-condensed">
                <tbody>
                @foreach($grab_db as $row)
                    <tr>
                        <td><input type="checkbox" name="checkbox[{{ $row->id }}]" /></td>
                        <td>{{ Form::text('val1['.$row->id.']', $row->val1, ["size" => "15", "maxlength" => "128",'class'=> 'form-control']) }}</td>
                        <td>{{ Form::text('val2['.$row->id.']', $row->val2, ["size" => "15", "maxlength" => "128",'class'=> 'form-control']) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    <div class="tab-pane fade" id="group" style="padding-top: 2em">
        <div class="col-md-8 col-md-offset-2">
            {{ Form::open(array('route' => ['adm.tools.grab.store'],'class' => 'form-horizontal', 'role' => 'form')) }}
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
                        <td colspan="1" class="text-center">{{ Form::submit('Provést zvolenou akci', array('name' => 'submit-profile-action','class' => 'btn btn-primary')) }}</td>
                    </tr>
                </tfoot>
            </table>
            {{ Form::close() }}
        </div>
    </div>
    <div class="tab-pane fade" id="add-group" style="padding-top: 2em">
        {{ Form::open(array('route' => ['adm.tools.grab.store'],'class' => 'form-horizontal', 'role' => 'form')) }}
        <div class="form-group">
            {{ Form::label('charset','Znaková sada',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('charset', NULL, ["size" => "12", "maxlength" => "16","required" => "required",'class'=> 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('name','Název skupiny',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('name', NULL, ["size" => "24", "maxlength" => "40","required" => "required",'class'=> 'form-control']) }}
            </div>
        </div>
        <p class="text-center">
            {{ Form::submit('Přidat skupinu', array('name' => 'submit-add-group','class' => 'btn btn-success')) }}
        </p>
        {{ Form::close() }}
    </div>
</div>
@stop