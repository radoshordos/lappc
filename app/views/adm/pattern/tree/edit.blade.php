@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title') @parent Editace skupin zboží @stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
        $(document).ready(function () {
            $("#parent_id").select2({});
        });
    </script>
@stop

{{-- Content --}}
@section('content')
    {{ Form::model($tree, ['method'=>'PATCH','route' => array('adm.pattern.tree.update',$tree->id),'class'=>'form-horizontal','role'=>'form']) }}
    <div class="form-group">
        {{ Form::label('id','ID',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::number('id',NULL,['min'=> '20000000','max'=> '29000000','required' => 'required','readonly' => 'readonly','class'=> 'form-control', 'placeholder'=> 'ID určené pro skupinu']) }}
        </div>
        {{ Form::label('deep','Zanoření',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::number('deep',NULL,['min'=> '20000000','max'=> '29000000','required' => 'required','readonly' => 'readonly','class'=> 'form-control', 'placeholder'=> 'ID určené pro skupinu']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('parent_id','Rodič',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('parent_id',$select_parent, NULL, ['required' => 'required', 'class'=> 'form-control', 'placeholder'=> 'Rodič']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('name','Název skupiny',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name',NULL,['required' => 'required', 'maxlength' => '40', 'class'=> 'form-control', 'placeholder'=> 'Název skupiny']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('desc','Titulek skupiny',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('desc',NULL,['required' => 'required', 'maxlength' => '80', 'class'=> 'form-control', 'placeholder'=> 'Titulek skupiny']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('relative','Reletivní cesta',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('relative',NULL,['required' => 'required', 'maxlength' => '64', 'class'=> 'form-control', 'placeholder'=> 'Relativní cesta']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('absolute','Absolutní cesta',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('absolute',NULL,['required' => 'required', 'readonly' => 'readonly', 'maxlength' => '256', 'class'=> 'form-control', 'placeholder'=> 'Absolutní cesta']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('category_text','Text kategorie',['class'=> 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('category_text',NULL,['required' => 'required', 'readonly' => 'readonly', 'maxlength' => '256', 'class'=> 'form-control']) }}
        </div>
    </div>
    <p class="text-center">
        {{ link_to_route('adm.pattern.tree.index','Zobrazit skupiny zboží',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
        {{ Form::submit('Editovat výrobce', ['class' => 'btn btn-info']) }}
    </p>
    {{ Form::close() }}

    <br/>
    <br/>

    @if (count($tree->treeDev)>0)
        <div class="col-md-6 col-md-offset-3">
            <table class="table">
                <thead>
                <tr>
                    <th rowspan="2">Výrobce</th>
                    <th colspan="2">Skupina a podskupiny</th>
                    <th colspan="2">Aktuální skupina</th>
                </tr>
                <tr>
                    <th>Vše</th>
                    <th>Viditelné</th>
                    <th>Vše</th>
                    <th>Viditelné</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tree->treeDev as $td)
                    <tr>
                        <td><span class="label label-info">{{ $select_dev[$td->dev_id] }}</span></td>
                        <td><span class="label label-warning">{{ $td->dir_visible }}</span></td>
                        <td><span class="label label-warning">{{ $td->dir_all }}</span></td>
                        <td><span class="label label-warning">{{ $td->dir_visible }}</span></td>
                        <td><span class="label label-warning">{{ $td->dir_all }}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop