@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Rozdělení nadskupin
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered table-hover table-striped table-condensed">
            <thead>
                <th>#ID</th>
                <th>Název</th>
                <th>Specifický<br />alias</th>
                <th>Vkládatelné<br /> produkty</th>
                <th>Nadskupina</th>
            </thead>
            @foreach ($treegroup as $tgt)
            <tr>
                <td>{{ $tgt->id }}</td>
                <td>{{ $tgt->name }}</td>
                <td>{{ $tgt->type }}</td>
                <td>{{ ($tgt->for_prod == 1 ? 'ANO' : 'NE') }}</td>
                <td>{{ $tgt->treeGroupTop->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop