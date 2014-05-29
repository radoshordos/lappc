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
        $("#is_sell").select2({
            placeholder: "Prodává se nyní produkt?",
            minimumResultsForSearch: 10,
            allowClear: true
        });
        $("#is_action").select2({
            placeholder: "Je nyní produkt v akci?",
            minimumResultsForSearch: 10,
            allowClear: true
        });
        $("#is_ready_send").select2({
            placeholder: "Je produkt možný ihned odeslat?",
            minimumResultsForSearch: 10,
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')

<h3 class="text-center">Nové pravidlo</h3>

{{ Form::open(array('action' => 'PpcRulesController@store', 'class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    <label for="name_lenght_min" class="col-sm-2 control-label">Počet znaků</label>

    <div class="col-sm-5">
        {{ Form::input('number','name_lenght_min', null ,array('class'=>'form-control','placeholder' => 'Minimální délka názvu')) }}
    </div>
    <div class="col-sm-5">
        {{ Form::input('number','name_lenght_max', null ,array('class'=>'form-control','placeholder' => 'Maximální délka názvu')) }}
    </div>
</div>
<div class="form-group">
    <label for="name_count_word_min" class="col-sm-2 control-label">Počet slov</label>

    <div class="col-sm-5">
        {{ Form::input('number','name_count_word_min', null ,array('class'=>'form-control','placeholder' => 'Minimální počet slov v názvu')) }}
    </div>
    <div class="col-sm-5">
        {{ Form::input('number','name_count_word_max', null ,array('class'=>'form-control','placeholder' => 'Maximální počet slov v názvu')) }}
    </div>
</div>
<div class="form-group">
    <label for="price_min" class="col-sm-2 control-label">Cena</label>

    <div class="col-sm-5">
        {{ Form::input('number','price_min', null ,array('class'=>'form-control','placeholder' => 'Minimální cena zboží')) }}
    </div>
    <div class="col-sm-5">
        {{ Form::input('number','price_max', null ,array('class'=>'form-control','placeholder' => 'Maximální cena zboží')) }}
    </div>
</div>
<div class="form-group">
    <label for="is_sell" class="col-sm-2 control-label">Prodává se</label>

    <div class="col-sm-6">
        <?php echo Form::select('is_sell', array("" => "", "NO" => "NE", "YES" => "ANO"), NULL, array('id' => 'is_sell', 'class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
    <label for="is_action" class="col-sm-2 control-label">Produkt v akci</label>

    <div class="col-sm-6">
        <?php echo Form::select('is_action', array("" => "", "NO" => "NE", "YES" => "ANO"), NULL, array('id' => 'is_action','class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
    <label for="is_ready_send" class="col-sm-2 control-label">Připraven k odeslání</label>

    <div class="col-sm-6">
        <?php echo Form::select('is_ready_send', array("" => "", "NO" => "NE", "YES" => "ANO"), NULL, array('id' => 'is_ready_send','class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Vytvořit nové pravidlo', array('class' => 'btn btn-default')) }}
    </div>
</div>


{{ Form::close() }}


@stop
