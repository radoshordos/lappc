@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Simulace filtru
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.tools.grabsimulator.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">URL</span>
                    {{ Form::url('profile_url', $profile_url, ["maxlength" => "255",'class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group">
                        <span class="input-group-addon">Profil</span>
                        {{ Form::select('profile_id', $profile_id, $choise_profile_id, ['id' => 'profile_id', 'class'=> 'form-control']) }}
                        <span class="input-group-btn">
                            {{ Form::submit('Go!',['class' => 'btn btn-success'])  }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

@if ($profile_id > 0)
<table>
    <tbody>
        <tr>
            <td>{{ Form::textarea('reading', NULL, ['size' => '80x35','class'=> 'form-control']); }}</td>
            <td>{{ Form::textarea('results', NULL, ['size' => '80x35','class'=> 'form-control']); }}</td>
        </tr>
    </tbody>
</table>
@endif

@stop