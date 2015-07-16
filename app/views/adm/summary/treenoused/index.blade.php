@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Nevyužité skupiny
@stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (count($tree)>0)
            <table class="table table-bordered table-hover table-striped table-condensed">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Název</th>
                    <th>Cesta</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tree as $row)
                    <tr>
                        <td>{{ link_to_route('adm.pattern.tree.edit', $row->id , $row->id) }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->absolute }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-success text-center" role="alert">
                <h3>Žádné nevyužité skupiny</h3>
            </div>
            @endif
        </div>
    </div>
@stop