@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent Multimédia @stop

{{-- Content --}}
@section('content')

@if ($media->count())
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Typ</th>
                    <th>Název</th>
                    <th colspan="3">Source</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td class="text-center" colspan="7">{{ $media->links(); }}</td>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($media as $row)
                <tr>
                    <td>{{ $row->mediaVariations->name }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ htmlspecialchars($row->source) }}</td>
                    <td>{{ link_to_route('adm.pattern.multimedia.show','Detail',array($row->id),array('class' => 'btn btn-primary btn-xs')) }}</td>
                    <td>{{ link_to_route('adm.pattern.multimedia.edit','Edit',array($row->id),array('class' => 'btn btn-info btn-xs')) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.multimedia.create','Přidat multimedia',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop