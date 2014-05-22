@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Resend Activation
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {{ Form::open(array('action' => 'UserController@resend', 'method' => 'post')) }}

        <h2>Znovu zaslat aktivační email</h2>

        <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
            {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail', 'autofocus')) }}
            {{ ($errors->has('email') ? $errors->first('email') : '') }}
        </div>

        {{ Form::submit('Znovu zaslat', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</div>

@stop
