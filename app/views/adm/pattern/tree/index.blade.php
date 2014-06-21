@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Skupiny zboží
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#treegroup").select2({
            placeholder: "Prodává se nyní produkt?",
            minimumResultsForSearch: 10,
            allowClear: true
        });
        $("#pdeep").select2({
            placeholder: "Prod",
            minimumResultsForSearch: 10,
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
<blockquote>
    <form>
        <div class="row">
            <div class="col-xs-4">
                {{ Form::select('treegroup',['0' => 'Všechny nadskupiny'] + $select_group, (isset($input['treegroup']) ? $input['treegroup'] : NULL) , array('id'=> 'treegroup', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('deep',['0' => 'Všechny úrovně zanoření','1','2','3'], (isset($input['deep']) ? $input['deep'] : NULL), array('id'=> 'deep', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('limit',['30' => '30 zobrazených položek','90' => '90 zobrazených položek'], (isset($input['limit']) ? $input['limit'] : NULL), array('id'=> 'limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()')) }}
            </div>
        </div>
    </form>
</blockquote>

@if ($trees->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>#Rodič</th>
                <th>Název</th>
                <th>Titulek</th>
                <th>Absolutní cesta</th>
                <th><span class="glyphicon glyphicon-edit"></span></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($trees as $tree)
            <tr>
                <td>{{ $tree->id }}</td>
                <td>{{ $tree->parent_id }}</td>
                <td>{{ $tree->name }}</td>
                <td>{{ $tree->desc }}</td>
                <td>{{ $tree->absolute }}</td>
                <td>{{ link_to_route('adm.pattern.tree.edit','Edit',array($tree->id),array('class' => 'btn btn-info btn-xs')) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.tree.create','Přidat novou skupinu',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop