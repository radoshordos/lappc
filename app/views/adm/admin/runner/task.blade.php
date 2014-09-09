@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Runner => Spuštěné skripty
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
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
                <td>{{  str_replace('Authority\\Runner\\Task\\', '', $object->getClassName())  }}</td>
                <td>{{ ($object->getTimeRunTask()) }}</td>
                <td>{{ ($object->getMessages()) }}</td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">Celkem: <b> {{ $object->getTimeRunAll() }} </b></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop