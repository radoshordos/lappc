@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h4>Informace o profilu:</h4>

<div class="well clearfix">
    <div class="col-md-8">
        @if ($user->first_name)
        <p><strong>Jméno:</strong> {{ $user->first_name }} </p>
        @endif
        @if ($user->last_name)
        <p><strong>Příjmení:</strong> {{ $user->last_name }} </p>
        @endif
        <p><strong>Email:</strong> {{ $user->email }}</p>

    </div>
    <div class="col-md-4">
        <p><em>Účet vytvořen: {{ $user->created_at }}</em></p>

        <p><em>Poslední změna: {{ $user->updated_at }}</em></p>
        <button class="btn btn-primary" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">
            Editovat profil
        </button>
    </div>
</div>

<h4>Členství ve skupinách:</h4>
<?php $userGroups = $user->getGroups(); ?>
<div class="well">
    <ul>
        @if (count($userGroups) >= 1)
        @foreach ($userGroups as $group)
        <li>{{ $group['name'] }}</li>
        @endforeach
        @else
        <li>Nepatří do žádné skupiny.</li>
        @endif
    </ul>
</div>

<hr/>

<h4>User Object</h4>
<div>
    <pre>{{ var_dump($user) }}</pre>
</div>

@stop
