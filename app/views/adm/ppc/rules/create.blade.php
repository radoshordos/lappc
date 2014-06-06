@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Nové pravidlo
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#in_sell").select2({
            placeholder: "Prodává se nyní produkt?",
            minimumResultsForSearch: 10,
            allowClear: true
        });
        $("#in_action").select2({
            placeholder: "Je nyní produkt v akci?",
            minimumResultsForSearch: 10,
            allowClear: true
        });
        $("#ready_send").select2({
            placeholder: "Je produkt možný ihned odeslat?",
            minimumResultsForSearch: 10,
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('action' => 'PpcRulesController@store', 'class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('modes','Mód',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('modes', array("import" => 'Import', "insert" => 'Insert'), NULL, array('id' => 'modes', 'class' => 'form-control')); }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('name_lenght_min','Počet znaků',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::input('number','name_lenght_min', null ,array('min'=>'0','class'=>'form-control','placeholder' => 'Minimální délka názvu')) }}
    </div>
    <div class="col-sm-5">
        {{ Form::input('number','name_lenght_max', null ,array('min'=>'0','class'=>'form-control','placeholder' => 'Maximální délka názvu')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name_count_word_min','Počet slov',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::input('number','name_count_word_min', null ,array('min'=>'0','class'=>'form-control','placeholder' => 'Minimální počet slov v názvu')) }}
    </div>
    <div class="col-sm-5">
        {{ Form::input('number','name_count_word_max', null ,array('min'=>'0','class'=>'form-control','placeholder' => 'Maximální počet slov v názvu')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('price_min','Cena',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::input('number','price_min', null ,array('min'=>'0','class'=>'form-control','placeholder' => 'Minimální cena zboží')) }}
    </div>
    <div class="col-sm-5">
        {{ Form::input('number','price_max', null ,array('min'=>'0','class'=>'form-control','placeholder' => 'Maximální cena zboží')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('in_sell','Prodává se',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-6">
        <?php echo Form::select('in_sell', array("" => "", "NO" => "NE", "YES" => "ANO"), NULL, array('id' => 'in_sell', 'class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
    {{ Form::label('in_action','Produkt v akci',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-6">
        <?php echo Form::select('in_action', array("" => "", "NO" => "NE", "YES" => "ANO"), NULL, array('id' => 'in_action', 'class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
    {{ Form::label('ready_send','Připraven k odeslání',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-6">
        <?php echo Form::select('ready_send', array("" => "", "NO" => "NE", "YES" => "ANO"), NULL, array('id' => 'ready_send', 'class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Vytvořit nové pravidlo', array('class' => 'btn btn-success')) }}
    </div>
</div>

{{ Form::close() }}

@stop
