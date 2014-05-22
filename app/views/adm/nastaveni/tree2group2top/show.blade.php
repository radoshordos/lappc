@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h4>Informace o profilu:</h4>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
            @foreach ($tree2group2top as $tgt)
            <tr>
                <td>{{ $tgt->id }}</td>
                <td>{{ $tgt->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


<hr/>

@stop