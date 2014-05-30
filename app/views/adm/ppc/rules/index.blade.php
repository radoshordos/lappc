@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
PPC - Klíčová slova
@stop

{{-- Content --}}
@section('content')
@if ($rules->count())
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Mód</th>
                <th colspan="2">Znaků</th>
                <th colspan="2">Slov</th>
                <th colspan="2">Cena</th>
            </tr>
            <tr>
                <th>Min</th>
                <th>Max</th>
                <th>Min</th>
                <th>Max</th>
                <th>Od</th>
                <th>Do</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rules as $rule)
            <tr>
                <td>{{ $rule->id }}</td>
                <td>{{ $rule->modes }}</td>
                <td>{{ $rule->name_lenght_min }}</td>
                <td>{{ $rule->name_lenght_max }}</td>
                <td>{{ $rule->name_count_word_min }}</td>
                <td>{{ $rule->name_count_word_max }}</td>
                <td>{{ $rule->price_min }}</td>
                <td>{{ $rule->price_max }}</td>
            @endforeach
            </tbody>
        </table>
        <p>
            {{ link_to_route('adm.ppc.rules.create','Přidat nové pravidlo',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
        </p>
    </div>
</div>
@else
{{ "NE" }}
@endif

@stop