@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Tree GroupTop
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
            @foreach ($treegrouptop  as $tgt)
            <tr>
                <td>{{ $tgt->id }}</td>
                <td>{{ $tgt->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop