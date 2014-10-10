@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
DIFF PROD
@stop

{{-- Content --}}
@section('content')

<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Differenční seskupení</a></li>
    <li><a href="#tab2" role="tab" data-toggle="tab">Nastavit seskupení</a></li>
    <li><a href="#tab3" role="tab" data-toggle="tab">Differenční skupiny</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="tab1" style="padding-top: 2em">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Délka</th>
                        <th>Skupina</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prod_difference as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->count }}</td>
                        <td>{{ $row->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="tab2" style="padding-top: 2em"></div>
    <div class="tab-pane fade" id="tab3" style="padding-top: 2em">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Skupina</th>
                        <th>Řadit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prod_difference_set as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->sortby }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop