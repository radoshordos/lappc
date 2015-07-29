<div id="product">
	<div class="row">
		<div id="product-image" class="medium-7 columns">
			<a class="gallery th" role="button" aria-label="Detailní náhled obrázku" title="{{ $vpa->getProdName() }}" href="{{ $vpa->getProdImgBigWithDir() }}">
				<img aria-hidden="true" width="240" height="240" src="{{ $vpa->getProdImgNormalWithDir() }}" title="{{ $vpa->getProdName() }}" alt="{{ $vpa->getProdName() }}"/>
			</a>
		</div>
		<div class="medium-11 columns">
			@include('web.prod.price')
			@include('web.prod.panel_information')
		</div>
	</div>

	<div class="row">
		<div class="medium-18 columns">
			@include('web.prod.panel_transport')
		</div>
	</div>
	<div class="row">
		<div class="medium-18 columns">
			@if (isset($mi_row) && $mi_row->items != NULL)
				<div class="row">ZDARMA</div>
				@foreach($mi_row->items as $item)
					<div class="row">
						<a class="th" role="button" aria-label="Zdarma k produktu" href="">
							<img src="{{ "/web/naradi/". $item->prod->tree->absolute."/". $vpa->getProdImgNormal() }}" width="120" height="120">
						</a>
					</div>
				@endforeach
			@endif
		</div>
	</div>
	<div class="row">
		<div class="medium-18 columns">
			@include('web.prod.description')
			<hr/>
			@if (!empty($items_accessory))
				@foreach($items_accessory as $row)
					<a href="{{ "/".$row->tree_absolute."/". $row->prod_alias }}">
						<img src="{{ "/web/naradi/". $row->tree_absolute."/". $row->prod_img_normal }}" width="120" height="120">
					</a>
				@endforeach
			@endif
		</div>
	</div>
</div>