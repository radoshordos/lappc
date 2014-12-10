@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Detail media
@stop

{{-- Content --}}
@section('content')
<div class="well text-center">
    <table class="table">
        <tr>
            <td>
                    {{ Form::open(['method' => 'DELETE', 'route' => ['adm.pattern.multimedia.destroy', $media->id]]) }}
                    {{ Form::submit('Smazat',['class' => 'btn btn-danger btn-xs']) }}
                    {{ Form::close() }}
            </td>
		</tr>
        <tr>
            <td>{{ $media->source }}</td>
        </tr>
    </table>
</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.multimedia.index','Zobrazit všechny multimedia',NULL,['class'=>'btn btn-primary','role'=> 'button']) }}
</p>
@stop
