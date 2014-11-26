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
                minimumResultsForSearch: 3,
                allowClear: true
            });
            $("#deep").select2({
                minimumResultsForSearch: 10,
                allowClear: true
            });
            $("#limit").select2({
                minimumResultsForSearch: 10,
                allowClear: true
            });
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::open(['route' => ['adm.pattern.tree.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}
    <blockquote>
        <div class="row">
            <div class="col-xs-4">
                {{ Form::select('treegroup',
                    ['0' => 'Všechny nadskupiny'] + $select_group, (isset($input['treegroup']) ? $input['treegroup'] : NULL),
                    ['id'=> 'treegroup', 'class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
            <div class="col-xs-4">
                {{ Form::select('deep',
                    ['0' => 'Všechny úrovně zanoření','1' => '1. úroveň zanoření','2'=> '2. úroveň zanoření','3'=> '3. úroveň zanoření'],
                    (isset($input['deep']) ? $input['deep'] : NULL),
                    ['id'=> 'deep', 'class'=> 'form-control', 'onchange' => 'this.form.submit()'])
                }}
            </div>
            <div class="col-xs-3">
                {{ Form::select('limit',
                    ['30' => '30 zobrazených položek','90' => '90 zobrazených položek'], (isset($input['limit']) ? $input['limit'] : NULL),
                    ['id'=> 'limit', 'class'=> 'form-control', 'onchange' => 'this.form.submit()'])
                }}
            </div>
            <div class="col-xs-1">
                {{ Form::submit('Hledat',['name' => 'hledat','class'=> 'form-control btn-primary'])  }}
            </div>
        </div>
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
                        <th class="col-xs-4">{{ Form::text('search_desc',$search_desc,['placeholder'=> 'Titulek']) }}</th>
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
                            <td>{{ link_to_route('adm.pattern.tree.edit','Edit',[$tree->id],['class' => 'btn btn-info btn-xs']) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    {{ Form::close() }}
    <p class="text-center">
        {{ link_to_route('adm.pattern.tree.create','Přidat novou skupinu',NULL, ['class'=>'btn btn-success','role'=> 'button']) }}
    </p>
@stop