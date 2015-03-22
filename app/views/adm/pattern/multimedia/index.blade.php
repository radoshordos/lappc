@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Multimédia @stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.pattern.multimedia.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
    <blockquote>
        <div class="row">
            <div class="col-xs-10">
                {{ Form::select('select_variations', $select_variations, $choice_variations, ['id'=> 'select_variations', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::select('select_limit', ['20' => ' Limit 20','30' => ' Limit 30','90' => 'Limit 90'], $choice_limit, ['id'=> 'select_limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        </div>
    </blockquote>
{{ Form::close() }}

@if ($media->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Typ</th>
                    <th>Název</th>
                    <th colspan="3">Source</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Celkem <b>{{ $media->getTotal() }}</b> záznamů</td>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($media as $row)
                <tr>
                    <td>{{ $row->variations_id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ htmlspecialchars($row->source) }}</td>
                    <td>{{ link_to_route('adm.pattern.multimedia.show','Detail',[$row->id],['class' => 'btn btn-primary btn-xs']) }}</td>
                    <td>{{ link_to_route('adm.pattern.multimedia.edit','Edit',[$row->id],['class' => 'btn btn-info btn-xs']) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="text-center">{{ $media->links(); }}</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.multimedia.create','Přidat multimedia',NULL, ['class'=>'btn btn-success','role'=> 'button']) }}
</p>
@stop