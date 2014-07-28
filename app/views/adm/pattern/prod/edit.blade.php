@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Editace produktu
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#list_tree").select2({});
        $("#tree_id").select2({});
        $("#dev_id").select2({});
    });
</script>
@stop


{{-- Content --}}
@section('content')
<div id="lasmall">
<table class="table table-striped table-bordered">
    <tbody>
    <tr>
        <th>Skupina</th>
        <td>
            {{ Form::open(array('action' => array('ProdController@edit', $prod->id,"tree_id=".$list_tree_id))) }}
            {{ Form::select('list_tree',$list_tree, $list_tree_id, array('id' => 'list_tree', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            {{ Form::close() }}
        </td>
        <td rowspan="2">
            <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-forward"></span>
            </button>
        </td>
    </tr>
    <tr>
        <th>Produkt</th>
        <td>{{ Form::select('list_prod',$list_prod, NULL, array('class'=> 'form-control')) }}</td>
    </tr>
    </tbody>
</table>


{{ Form::model($prod, array('method'=>'PATCH','route' => array('adm.pattern.prod.update',$prod->id),'class'=>'form-horizontal','role'=>'form')) }}



<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="form-group">
            {{ Form::label('tree_id','Skupina',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('tree_id',$select_tree, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-4">
        <div class="form-group">
            {{ Form::label('warranty_id','Záruka',array('class'=> 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('warranty_id',$select_warranty, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Záruka produktu')) }}
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::label('dev_id','Výrobce',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('dev_id',$select_dev, NULL, array('required' => 'required', 'class'=> 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('alias','Alias',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('alias',NULL,array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Alias produktu')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název výrobce',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název produktu')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('desc','Popis',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('desc',NULL,array('required' => 'required', 'maxlength' => '80', 'class'=> 'form-control', 'placeholder'=> 'Popis produktu')) }}
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
    <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
    <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
</div>


<p class="text-center">
    {{ link_to_route('adm.pattern.prod.index','Zobrazit všechny produkty',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Editovat produkt', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}
</div>
@stop