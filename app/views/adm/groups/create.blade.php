@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Create Group
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
	{{ Form::open(array('action' => 'GroupController@store')) }}
        <h2>Vytvořit novou skupinu</h2>
    
        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            {{ ($errors->has('name') ? $errors->first('name') : '') }}
        </div>

        {{ Form::label('Permissions') }}
        <div class="form-group">
            <label class="checkbox-inline">
                {{ Form::checkbox('adminPermissions', 1) }} Admins
            </label>
            <label class="checkbox-inline">
                {{ Form::checkbox('powerUserPermissions', 1) }} Power Users
            </label>
            <label class="checkbox-inline">
                {{ Form::checkbox('simpleUserPermissions', 1) }} Simple Users
            </label>
        </div>

        {{ Form::submit('Vytvořit novou skupinu', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
    </div>
</div>

@stop