@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Správa grupy produktů
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#prod_id").select2({
            placeholder: "Přidejte produkt do grupy",
            allowClear: true
        });
        $("#select_dev").select2({
            placeholder: "Výběr výrobce",
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::model($mixtureprod, ['method'=>'PATCH','route' => ['adm.pattern.mixtureprod.update',$mixtureprod->id],'class'=>'form-horizontal','role'=>'form']) }}
<div class="panel panel-info">
    <div class="panel-heading"><label for="name">Oprava názvu skupiny produktů</label></div>
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
                {{  Form::text('name',$mixtureprod->name, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové grupy produktů']) }}
            </div>
        </div>
    </div>
    <div class="panel-footer text-center">
        {{ link_to_route('adm.pattern.mixtureprod.index','Zobrazit všechny položky',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
        {{ Form::submit('Opravit název grupy produktů', ['class' => 'btn btn-info']) }}
    </div>
</div>
{{ Form::close() }}

<div class="panel panel-success">
    <div class="panel-heading">
        <strong>Přiřazení produkty</strong>
    </div>
    <div class="panel-body">
        {{ Form::open(['route' => ['adm.pattern.mixtureprod.edit',$id, $choice_dev],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
        <table class="table table-bordered table-striped">
            <tbody>
            @foreach($mixtureprod->prod as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>
                    {{ Form::open(['method' => 'DELETE', 'route' => ['adm.pattern.mixtureprodm2nprod.destroy', $mixtureprod->id."x".$row->id ]]) }}
                    {{ Form::submit('Smazat',['class' => 'btn btn-danger btn-xs']) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ Form::close() }}
    </div>
    <div class="panel-footer">
        {{ Form::open(['route' => 'adm.pattern.mixtureprodm2nprod.store','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="form-group">
            {{ Form::label('select_dev','Výrobce',['class'=> 'col-sm-1 control-label']) }}
            <div class="col-sm-11">
                {{  Form::select('select_dev',$select_dev, $choice_dev, ['required' => 'required', 'id'=> 'select_dev', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-btn">
                {{ Form::submit('Přidat produkt',['class' => 'btn btn-success']) }}
            </span>
            {{ Form::select('prod_id',$prod_insertable, NULL, ['required' => 'required', 'id'=> 'prod_id',  'class'=> 'form-control']) }}
            {{ Form::hidden('mixture_prod_id',$mixtureprod->id) }}
        </div>
        {{ Form::close() }}
    </div>

</div>
@stop