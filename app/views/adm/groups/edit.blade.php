@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Editovat skupinu
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::open(array('action' => array('GroupController@update', $group->id), 'method' => 'put')) }}
        <h2>Editovat skupinu</h2>

        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
            {{ Form::text('name', $group->name, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            {{ ($errors->has('name') ? $errors->first('name') : '') }}
        </div>

        {{ Form::label('Permissions') }}
        <?php
        $permissions = $group->getPermissions();
        if (!array_key_exists('admin', $permissions)) {
            $permissions['admin'] = 0;
        }
        if (!array_key_exists('power', $permissions)) {
            $permissions['power'] = 0;
        }
        if (!array_key_exists('simple', $permissions)) {
            $permissions['simple'] = 0;
        }
        ?>

        <div class="form-group">
            <label class="checkbox-inline">
                {{ Form::checkbox('adminPermissions', 1, $permissions['admin'] ) }} Admin
            </label>
            <label class="checkbox-inline">
                {{ Form::checkbox('powerUserPermissions', 1, $permissions['power'] ) }} Power Users
            </label>
            <label class="checkbox-inline">
                {{ Form::checkbox('simpleUserPermissions', 1, $permissions['simple'] ) }} Simple Users
            </label>
        </div>

        {{ Form::hidden('id', $group->id) }}
        {{ Form::submit('Uložit změny', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</div>

@stop