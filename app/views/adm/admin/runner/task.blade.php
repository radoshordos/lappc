@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Runner => Spuštěné skripty
@stop

{{-- Content --}}
@section('content')



<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Modul</th>
                <th>Čas</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($ao as $object)
            <tr>
                <td>{{ ($run->class) }}</td>
                <td>{{ ($object->getTime()) }}</td>
                <td>{{ ($object->getMessages()) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop