@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Nové pravidlo
@stop

{{-- Content --}}
@section('content')

<h3 class="text-center">Nové pravidlo</h3>

{{ Form::open(array('action' => 'PpcRulesController@store', 'class' => 'form-horizontal', 'role' => 'form')) }}




<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="name_lenght_min" class="col-sm-2 control-label">Min</label>
        <div class="col-sm-4">
            {{ Form::input('number','name_lenght_min', null ,array('class'=>'form-control','placeholder' => 'Minimální délka názvu')) }}
        </div>
        <label for="name_lenght_min" class="col-sm-2 control-label">Max</label>
        <div class="col-sm-4">
            {{ Form::input('number','name_lenght_max', null ,array('class'=>'form-control','placeholder' => 'Maximální délka názvu')) }}
        </div>
    </div>
    <div class="form-group">
        <label for="name_count_word_min" class="col-sm-2 control-label">Min</label>
        <div class="col-sm-4">
            {{ Form::input('number','name_count_word_min', null ,array('class'=>'form-control','placeholder' => 'Minimální počet slov v názvu')) }}
        </div>
        <label for="name_count_word_max" class="col-sm-2 control-label">Max</label>
        <div class="col-sm-4">
            {{ Form::input('number','name_count_word_max', null ,array('class'=>'form-control','placeholder' => 'Maximální počet slov v názvu')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Vytvořit nové pravidlo', array('class' => 'btn btn-default')) }}
        </div>
    </div>
</form>



{{ Form::close() }}


@stop
