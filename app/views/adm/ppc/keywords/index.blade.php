@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Klíčová slova
@stop

{{-- Content --}}
@section('content')

<h3 class="text-center">Klíčová slova</h3>

@if ($keywords->count())
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Sklik ID</th>
                <th>Match ID</th>
                <th>Jméno</th>
                <th>CPC</th>
                <th>X</th>
            <tr>
                @foreach ($keywords as $keyword)
            <tr>
                <td>{{ $keyword->id }}</td>
                <td>{{ $keyword->sklik_id }}</td>
                <td>{{ $keyword->match_id }}</td>
                <td>{{ $keyword->name }}</td>
                <td>{{ $keyword->cpc }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => 'adm.ppc.keywords.destroy', $keyword->id)) }}
                    {{ Form::submit('Smazat',array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@else
{{ "NE" }}
@endif

@stop