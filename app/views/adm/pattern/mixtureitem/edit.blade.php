@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Správa grupy položek
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#prod_id").select2({
            placeholder: "Přidejte položky do grupy",
            allowClear: true
        });
        $("#item_id").select2({});
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::model($mixtureitem, ['method'=>'PATCH','route' => array('adm.pattern.mixtureitem.update',$mixtureitem->id),'class'=>'form-horizontal','role'=>'form']) }}
<div class="panel panel-info">
    <div class="panel-heading"><label for="name">Oprava názvu skupiny položek</label></div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('purpose','Účel',['class'=> 'col-sm-1 control-label']) }}
            <div class="col-sm-11">
                {{  Form::select('purpose',$select_purpose, $choice_purpose, ['required' => 'required','readonly' => 'readonly', 'id'=> 'purpose',  'class'=> 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('name','Název',['class'=> 'col-sm-1 control-label']) }}
            <div class="col-sm-11">
                {{  Form::text('name',$mixtureitem->name, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno grupy položek')) }}
            </div>
        </div>
    </div>
    <div class="panel-footer text-center">
        {{ link_to_route('adm.pattern.mixtureitem.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
        {{ Form::submit('Opravit název grupy položek', array('class' => 'btn btn-info')) }}
    </div>
</div>
{{ Form::close() }}

<div class="panel panel-success">
    <div class="panel-heading"><strong>Přiřazení položky</strong></div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tbody>
            @foreach($mixtureitem->items as $row)
            <tr>
                <td>{{ $row->prod->name }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => ['adm.pattern.mixtureitemm2nitem.destroy', $mixtureitem->id."x".$row->id ])) }}
                    {{ Form::submit('Smazat',array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        {{ Form::open(['route' => 'adm.pattern.mixtureitemm2nitem.store','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="input-group">
            <span class="input-group-btn">
                {{ Form::submit('Přidat položku',array('class' => 'btn btn-success')) }}
            </span>
            {{ Form::select('item_id',$item_insertable, NULL, array('required' => 'required', 'id'=> 'item_id',  'class'=> 'form-control')) }}
            {{ Form::hidden('mixture_item_id',$mixtureitem->id) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop