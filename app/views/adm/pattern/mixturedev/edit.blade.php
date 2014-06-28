@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nová skupina výrobců
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#dev_id").select2({
            placeholder: "Přidejte výrobce do skupiny",
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::model($mixturedev, array('method'=>'PATCH','route' => array('adm.pattern.mixturedev.update',$mixturedev->id),'class'=>'form-horizontal','role'=>'form')) }}
<div class="panel panel-info">
    <div class="panel-heading"><label for="name">Oprava názvu skupiny výrobců</label></div>
    <div class="panel-body">
        {{ Form::text('name',$mixturedev->name, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové skupiny výrobců')) }}
    </div>
    <div class="panel-footer text-center">
        {{ link_to_route('adm.pattern.mixturedev.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
        {{ Form::submit('Opravit název skupiny', array('class' => 'btn btn-info')) }}
    </div>
</div>
{{ Form::close() }}

<div class="panel panel-success">
    <div class="panel-heading"><strong>Přiřazení výrobci</strong></div>
    <div class="panel-body">

        <table class="table table-bordered table-striped">
            <tbody>
            @foreach($mixturedev->dev as $dev)
            <tr>
                <td>{{$dev->name}}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('adm.pattern.mixturedevm2ndev.destroy', $mixturedev->id."x".$dev->id ))) }}
                    {{ Form::submit('Smazat',array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        {{ Form::open(array('route' => 'adm.pattern.mixturedevm2ndev.store','class' => 'form-horizontal', 'role' => 'form')) }}
        <div class="input-group">
            <span class="input-group-btn">
                {{ Form::submit('Přidat výrobce',array('class' => 'btn btn-success')) }}
            </span>
            {{ Form::select('dev_id',$dev_insertable, NULL, array('required' => 'required', 'id'=> 'dev_id',  'class'=> 'form-control')) }}
            {{ Form::hidden('mixture_dev_id',$mixturedev->id) }}
        </div>
        {{ Form::close() }}
    </div>
</div>

@stop