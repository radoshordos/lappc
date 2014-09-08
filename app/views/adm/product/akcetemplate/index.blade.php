@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Šablony akcí
@stop

{{-- JavaScript on page --}}
@section ('script')
@stop

{{-- Content --}}
@section('content')
@if ($akcetemplate->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Seskupení výrobců</th>
                <th>Minitext</th>
                <th>Dostupnost</th>
                <th>Automatické<br /> zrušení</th>
                <th>Titulek</th>
                <th>Text</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($akcetemplate as $row)
            <tr>
                <td>{{ $row->mixture_dev->name }}</td>
                <td>{{ $row->akce_minitext->name }}</td>
                <td>{{ $row->akce_availability->name }}</td>
                <td>{{ $row->endtime }}</td>
                <td>{{ $row->bonus_title }}</td>
                <td>{{ Form::textarea('bonus_text', $row->bonus_text, ['size' => '45x2', 'readonly' => 'readonly', 'class' => 'form-control' ]); }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
{{ link_to_route('adm.product.akcetemplate.create','Přidat novou šablonu akce',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop