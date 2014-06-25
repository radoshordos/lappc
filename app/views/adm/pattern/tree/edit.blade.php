@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Editace skupin zboží
@stop

{{-- Content --}}
@section('content')
{{ Form::model($tree, array('method'=>'PATCH','route' => array('adm.pattern.tree.update',$tree->id),'class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
    {{ Form::label('id','ID',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::input('number','id',NULL,array('min'=> '20000000','max'=> '29000000','required' => 'required','class'=> 'form-control', 'placeholder'=> 'ID určené pro skupinu'))
        }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('parent_id','Rodič',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::select('parent_id',$select_parent, NULL, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Rodič')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name','Název skupiny',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name',NULL,array('required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název skupiny')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('desc','Titulek skupiny',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('desc',NULL,array('required' => 'required', 'maxlength' => '80', 'class'=> 'form-control', 'placeholder'=> 'Titulek skupiny')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('relative','Reletivní cesta',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('relative',NULL,array('required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Relativní cesta')) }}
    </div>
</div>
<p class="text-center">
    {{ link_to_route('adm.pattern.tree.index','Zobrazit skupiny zboží',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
    {{ Form::submit('Editovat výrobce', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}

<br/>
<br/>

@if (count($tree->treeDev)>0)
<div class="col-md-6 col-md-offset-3">
    <table class="table">
        <thead>
        <tr>
            <th rowspan="2">Výrobce</th>
            <th colspan="2">Skupina a podskupiny</th>
            <th colspan="2">Akruální skupina</th>
        </tr>
        <tr>
            <th>Vše</th>
            <th>Viditelné</th>
            <th>Vše</th>
            <th>Viditelné</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tree->treeDev as $td)
        <tr>
            <td><span class="label label-info">{{ $select_dev[$td->dev_id] }}</span></td>
            <td><span class="label label-warning">{{ $td->dir_visible }}</span></td>
            <td><span class="label label-warning">{{ $td->dir_all }}</span></td>
            <td><span class="label label-warning">{{ $td->dir_visible }}</span></td>
            <td><span class="label label-warning">{{ $td->dir_all }}</span></td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endif

@stop