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
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::model($mixtureprod, ['method'=>'PATCH','route' => array('adm.pattern.mixtureprod.update',$mixtureprod->id),'class'=>'form-horizontal','role'=>'form']) }}
<div class="panel panel-info">
    <div class="panel-heading"><label for="name">Oprava názvu skupiny výrobců</label></div>
    <div class="panel-body">
        {{ Form::text('name',$mixtureprod->name, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové grupy produktů')) }}
    </div>
    <div class="panel-footer text-center">
        {{ link_to_route('adm.pattern.mixtureprod.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
        {{ Form::submit('Opravit název grupy produktů', array('class' => 'btn btn-info')) }}
    </div>
</div>
{{ Form::close() }}

<div class="panel panel-success">
    <div class="panel-heading"><strong>Přiřazení produkty</strong></div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tbody>
            @foreach($mixtureprod->prod as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('adm.pattern.mixtureprodm2nprod.destroy', $mixtureprod->id."x".$row->id ))) }}
                    {{ Form::submit('Smazat',array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        {{ Form::open(array('route' => 'adm.pattern.mixtureprodm2nprod.store','class' => 'form-horizontal', 'role' => 'form')) }}
        <div class="input-group">
            <span class="input-group-btn">
                {{ Form::submit('Přidat výrobce',array('class' => 'btn btn-success')) }}
            </span>
            {{ Form::select('prod_id',$prod_insertable, NULL, array('required' => 'required', 'id'=> 'prod_id',  'class'=> 'form-control')) }}
            {{ Form::hidden('mixture_prod_id',$mixtureprod->id) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop