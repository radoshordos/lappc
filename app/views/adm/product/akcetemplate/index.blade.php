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
                <th>Seskupení<br />výrobců</th>
                <th>Minitext</th>
                <th>Dostupnost</th>
                <th class="col-md-1">Automatické<br /> zrušení</th>
                <th class="col-md-2">Skupina položek<br />zdarma</th>
                <th>Titulek</th>
                <th class="col-md-2">Text</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($akcetemplate as $row)
            <tr>
                <td>{{ $row->mixture_dev->name }}</td>
                <td>{{ $row->akce_minitext->name }}</td>
                <td>{{ $row->akce_availability->name }}</td>
                <td class="col-md-1">{{ $row->endtime }}</td>
                <td class="col-md-2">{{ isset($row->mixture_item_id) ? $row->mixtureItem->name : NULL }}</td>
                <td>{{ $row->bonus_title }}</td>
                <td class="col-md-2">{{ Form::textarea('bonus_text', $row->bonus_text, ['size' => '40x2', 'readonly' => 'readonly', 'class' => 'form-control' ]); }}</td>
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