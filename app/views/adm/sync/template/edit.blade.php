@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nastavené elementů v .csv šabloně
@stop

{{-- Content --}}
@section('content')
{{ Form::model($template, array('method'=>'PATCH','route' => array('adm.sync.template.update',$template->id),'class'=>'form-horizontal','role'=>'form')) }}


{{ Form::close() }}
<div class="panel panel-default">
    <div class="panel-heading">Elementy dle pořadí</div>
    <table class="table">
        <thead>

        </thead>
        <tbody>
        <table class="table table-bordered table-striped">
            <tbody>
            @foreach($m2n as $row)
            <tr>
                <td>{{ '&lt'.$row->column->element }}></td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('adm.sync.templatem2ncolumn.destroy', $row->id ))) }}
                    {{ Form::submit('Smazat',array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </tbody>
        <tfoot>
        <div class="panel-footer">
            {{ Form::open(array('route' => 'adm.sync.templatem2ncolumn.store','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="input-group">
            <span class="input-group-btn">
                {{ Form::submit('Přidat pořadí sloupců',array('class' => 'btn btn-success')) }}
            </span>
                {{ Form::select('column_id', $select_column, NULL, array('required' => 'required', 'id'=> 'dev_id', 'class'=> 'form-control')) }}
                {{ Form::hidden('template_id',$template->id) }}
            </div>
            {{ Form::close() }}
        </div>
        </tfoot>
    </table>
</div>

<p class="text-center">
    {{ link_to_route('adm.sync.template.index','Zobrazit všechny .csv šablony',NULL, array('class'=>'btn btn-primary','role'=> 'button')) }}
</p>
@stop