@foreach($prod_desc_array as $pd)
	<div class="desc-list row">
		<h3>{{ $pd->mediaVariations->name }}</h3>
		<ul class="prod-desc">
			<li>{{ str_replace("\r\n", "</li><li>", $pd->data) }}</li>
		</ul>
	</div>
@endforeach

@if (!empty($media))
	<div class="desc-list">
		<h3>K prohlédnutí</h3>
		@foreach($media as $row)
			@if ($row['media_variations'] == 302)
				<div class="small-18 large-18 file column">
					<a role="button" aria-label="Příloha" href="/web/naradi/_doc/{{ $row['media_source'] }}"><i class="fa fa-file-pdf-o fa-lg"></i> {{ $row['media_name'] }}</a>
				</div>
			@elseif ($row['media_variations'] == 303)
				<div class="small-18 large-18 file column">
					<a role="button" aria-label="Příloha" href="/web/naradi/_doc/{{ $row['media_source'] }}"><i class="fa fa-file-image-o fa-lg"></i> {{ $row['media_name'] }}</a>
				</div>
			@elseif ($row['media_variations'] == 401)
				<div class="small-18 large-18 file column">
					<div class="flex-video text-center">
						<iframe width="420" height="315" src="{{ $row['media_source'] }}" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			@endif
		@endforeach
	</div>
@endif

@if (!empty($prod_picture))
	@foreach($prod_picture as $row)
		<a class="gallery th" role="button" aria-label="Fotogalerie" href="{{ "/web/naradi/". $vpa->getTreeAbsolute()."/". $row->img_big }}">
			<img aria-hidden="true" src="{{ "/web/naradi/".$vpa->getTreeAbsolute()."/". $row->img_normal }}" alt="{{ $vpa->getProdName() }} - Náhled obrázku {{ $row->img_big }} " width="120" height="120">
		</a>
	@endforeach
@endif