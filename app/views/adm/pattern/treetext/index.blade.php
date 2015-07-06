@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Texty ve skupinách
@stop

{{-- JavaScript on page --}}
@section ('script')
    <script>
    </script>
@stop

{{-- Content --}}
@section('content')
    @if ($list->count())
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#Skupina</th>
                        <th>Název</th>
                        <th><span class="glyphicon glyphicon-edit"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $row)
                        <tr>
                            <td>{{ $row->tree_id }}</td>
                            <td>{{ $row->tree->name }}</td>
                            <td>{{ link_to_route('adm.pattern.treetext.edit','Edit',[$row->id],['class' => 'btn btn-info btn-xs']) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <p class="text-center">
        {{ link_to_route('adm.pattern.treetext.create','Přidat nový text do skupiny',NULL, ['class'=>'btn btn-success','role'=> 'button']) }}
    </p>
@stop