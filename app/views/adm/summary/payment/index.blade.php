@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title') @parent Způsoby platby @stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-hover table-striped table-condensed">
                <thead>
                    <tr>
                        <th rowspan="2">#ID</th>
                        <th rowspan="2">Aktivní</th>
                        <th rowspan="2">Název</th>
                        <th rowspan="2">Cena<br />platby</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($payment as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ ($row->active == 1 ? 'ANO' : 'NE') }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->price_payment }} Kč</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop