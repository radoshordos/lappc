@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Produktové variace
@stop

{{-- Content --}}
@section('content')
{{ Form::open(array('route' => ['adm.pattern.prodvariation.index'], 'method' => 'get', 'role' => 'form')) }}
<div class="input-group form-group">
    <span class="input-group-addon">Volba variace</span>
    {{ Form::select('select_difference_set', $select_difference_set, $choice_difference_set, array('class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
</div>
{{ Form::close() }}

@if (count($prod_difference_values) > 0)
<div class="col-md-6 col-md-offset-3">
    <table class="table table-hover table-bordered table-condensed">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Název</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prod_difference_values as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif

<p class="text-center">
{{ link_to_route('adm.pattern.prodvariation.create','Přidat variaci',['select_difference_set' => $choice_difference_set], array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop