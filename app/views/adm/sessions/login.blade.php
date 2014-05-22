@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::open(array('action' => 'SessionController@store')) }}

            <h2 class="form-signin-heading">Přihlášení</h2>

            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'autofocus')) }}
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Heslo'))}}
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
            </div>
            
            <label class="checkbox">
                {{ Form::checkbox('rememberMe', 'rememberMe') }} přihlásit se trvale na tomto počítači
            </label>
            {{ Form::submit('Přihlásit', array('class' => 'btn btn-primary'))}}
            <a class="btn btn-link" href="{{ route('forgotPasswordForm') }}">Zapomenuté heslo</a>
        {{ Form::close() }}
    </div>
</div>

@stop