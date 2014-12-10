@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Detail media
@stop

{{-- Content --}}
@section('content')
<div class="well text-center">{{ $media->source }}</div>

<p class="text-center">
    {{ link_to_route('adm.pattern.multimedia.index','Zobrazit všechny multimedia',NULL, ['class'=>'btn btn-primary','role'=> 'button']) }}
</p>

@stop
