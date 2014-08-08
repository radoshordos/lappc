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
        $("#list_prod").select2({});
        $("#tree_id").select2({});
        $("#dev_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
<div id="lasmall">
{{ Form::open(array('method' => 'POST','action' => array('ProdController@edit', $choice_prod, "tree_id=".$choice_tree))) }}
<table class="table table-striped table-bordered">
    <tbody>
    <tr>
        <th>Skupina</th>
        <td>
        {{ Form::select('list_tree',$list_tree, $choice_tree, array('id' => 'list_tree', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
        </td>
    </tr>
    <tr>
        <th>Produkt</th>
        <td>
        @if (isset($list_prod) && !empty($list_prod))
            {{ Form::select('list_prod',$list_prod, $choice_prod, array('id' => 'list_prod','class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
        @endif
        </td>
    </tr>
    </tbody>
</table>
{{ Form::close() }}

@if (isset($prod))
{{ Form::model($prod, array('method'=>'PATCH','route' => array('adm.product.prod.update',$prod->id),'class'=>'form-horizontal','role'=>'form')) }}

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
    {{ link_to_route('adm.product.prod.index','Zobrazit všechny produkty',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Editovat produkt', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}
</div>
@endif
@stop