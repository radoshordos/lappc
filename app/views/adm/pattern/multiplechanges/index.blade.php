@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Hromadné změny prouktů
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#select_dev").select2({});
        $("#select_tree").select2({
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['action' => 'ProdMultipleChangesController@index', 'method' => 'GET']); }}
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">{{ Form::label('select_dev','Výrobce') }}</th>
            <th class="text-center">{{ Form::label('select_tree','Skupina [Nepovinné]') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-md-4">{{ Form::select('select_dev',$select_dev, $choice_select_dev, ['required' => 'required','class'=> 'form-control']) }}</td>
            <td class="col-md-8">{{ Form::select('select_tree',$select_tree, $choice_select_tree, ['class'=> 'form-control']) }}</td>
        </tr>
    </tbody>
</table>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>SLEVA</th>
                    <th>DOSTUPNOST</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">{{ Form::submit('Hrmodaně změnit',['name' => 'multi-change','class'=> 'btn-primary form-control']) }}</td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Aktuální</td>
                         <td>{{ Form::select('old_select_sale',$select_sale, $choice_old_select_sale, ['class'=> 'form-control']) }}</td>
                    <td>{{ Form::select('old_select_availability',$select_availability, $choice_old_select_availability, ['class'=> 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>Nová</td>
                    <td>{{ Form::select('new_select_sale',$select_sale, $choice_new_select_sale, ['class'=> 'form-control']) }}</td>
                    <td>{{ Form::select('new_select_availability',$select_availability, $choice_new_select_availability, ['class'=> 'form-control']) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{ Form::close(); }}
@stop