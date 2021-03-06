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
                <th colspan="3" class="text-center">{{ link_to_route('adm.ppc.rules.create','Přidat nové pravidlo',NULL, array('class'=>'btn btn-success btn-xs','role'=> 'button')) }}</th>
            </tr>
            <tr>
                <th>Min</th>
                <th>Max</th>
                <th>Min</th>
                <th>Max</th>
                <th>Od</th>
                <th>Do</th>
                <th>Prodej</th>
                <th>Akce</th>
                <th>Odeslání</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rules as $rule)
            <tr>
                <td>{{ $rule->id }}</td>
                <td>{{ $rule->modes }}</td>
                <td>{{ ($rule->name_lenght_min ? $rule->name_lenght_min : NULL) }}</td>
                <td>{{ ($rule->name_lenght_max ? $rule->name_lenght_max : NULL) }}</td>
                <td>{{ ($rule->name_count_word_min ? $rule->name_count_word_min : NULL) }}</td>
                <td>{{ ($rule->name_count_word_max ? $rule->name_count_word_max : NULL) }}</td>
                <td>{{ ($rule->price_min ? $rule->price_min : NULL) }}</td>
                <td>{{ ($rule->price_max ? $rule->price_max : NULL) }}</td>
                <td>{{ ($rule->in_sell ? $rule->in_sell : NULL) }}</td>
                <td>{{ ($rule->in_action ? $rule->in_action : NULL) }}</td>
                <td>{{ ($rule->ready_send ? $rule->ready_send : NULL) }}</td>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@else
<p>
    {{ link_to_route('adm.ppc.rules.create','Přidat nové pravidlo',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@endif
@stop