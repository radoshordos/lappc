@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Správa grup skupin
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#tree_id").select2({
            placeholder: "Přidejte skupinu do grupy",
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::model($mixturetree, array('method'=>'PATCH','route' => array('adm.pattern.mixturetree.update',$mixturetree->id),'class'=>'form-horizontal','role'=>'form')) }}
<div class="panel panel-info">
    <div class="panel-heading"><label for="name">Oprava názvu grupy spupin</label></div>
    <div class="panel-body">
        {{ Form::text('name',$mixturetree->name, array('required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Zadej jméno nové grupy skupin')) }}
    </div>
    <div class="panel-footer text-center">
        {{ link_to_route('adm.pattern.mixturetree.index','Zobrazit všechny položky',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
        {{ Form::submit('Opravit název grupy skuin', array('class' => 'btn btn-info')) }}
    </div>
</div>
{{ Form::close() }}

<div class="panel panel-success">
    <div class="panel-heading"><strong>Přiřazené skupiny</strong></div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tbody>
            @foreach($mixturetree->tree as $row)
            <tr>
                <td>{{ $row->name}}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('adm.pattern.mixturetreem2ntree.destroy', $mixturetree->id."x".$row->id ))) }}
                    {{ Form::submit('Smazat',array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        {{ Form::open(array('route' => 'adm.pattern.mixturetreem2ntree.store','class' => 'form-horizontal', 'role' => 'form')) }}
        <div class="input-group">
            <span class="input-group-btn">
                {{ Form::submit('Přidat skupinu',array('class' => 'btn btn-success')) }}
            </span>
            {{ Form::select('tree_id',$tree_insertable, NULL, array('required' => 'required', 'id'=> 'tree_id',  'class'=> 'form-control')) }}
            {{ Form::hidden('mixture_tree_id',$mixturetree->id) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop