@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Klíčová slova
@stop

{{-- Content --}}
@section('content')
<p>
    {{ link_to_route('adm.ppc.keywords.create','Přidat nové klíčové slovo',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@if ($keywords->count())
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Sklik ID</th>
                <th>Match ID</th>
                <th>Jméno</th>
                <th colspan="4">CPC</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($keywords as $keyword)
            <tr>
                <td>{{ $keyword->id }}</td>
                <td>{{ $keyword->sklik_id }}</td>
                <td>{{ $keyword->match_id }}</td>
                <td>{{ $keyword->name }}</td>
                <td>{{ $keyword->cpc }}</td>
                <td>{{ link_to_route('adm.ppc.keywords.show','Show',array($keyword->id),array('class' => 'btn btn-primary btn-xs')) }}</td>
                <td>{{ link_to_route('adm.ppc.keywords.edit','Edit',array($keyword->id),array('class' => 'btn btn-info btn-xs')) }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('adm.ppc.keywords.destroy', $keyword->id))) }}
                    {{ Form::submit('Smazat',array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
{{ "NE" }}
@endif

@stop