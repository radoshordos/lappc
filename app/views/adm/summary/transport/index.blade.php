@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title') @parent Způsoby doručení @stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered table-hover table-striped table-condensed">
                <thead>
                    <tr>
                        <th rowspan="2">#ID</th>
                        <th rowspan="2">Aktivní</th>
                        <th rowspan="2">Název</th>
                        <th colspan="2">Cena</th>
                        <th colspan="2">Hmotnost</th>
                        <th rowspan="2">Cena<br />dopravy</th>
                    </tr>
                    <tr>
                        <th>Od</th>
                        <th>Do</th>
                        <th>Od</th>
                        <th>Do</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transport as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ ($row->active == 1 ? 'ANO' : 'NE') }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->price_start }}</td>
                        <td>{{ $row->price_end }}</td>
                        <td>{{ $row->weight_start }}</td>
                        <td>{{ $row->weight_end }}</td>
                        <td>{{ $row->price_transport }} Kč</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop