<div id="desc-panel" class="panel radius">
	<div class="row">
		<div class="medium-9 columns">
			<p>Výrobce: {{ $vpa->getDevName()  }}</p>

			<p>Záruka: {{ $vpa->getProdWarrantyName() }} <span data-tooltip aria-haspopup="true" class="has-tip" title="Ale musíte se zaregistrovat na webu"><i class="fa fa-question-circle fa-lg"></i></span></p>
		</div>
		<div class="medium-9 columns">
			@if (!empty($item_row))
				@if (isset($item_row->code_prod ))
					<p>Kód: {{ $item_row->code_prod }}</p>
				@endif
				@if (isset($item_row->code_ean ))
					<p>EAN: {{ $item_row->code_ean }}</p>
				@endif
			@endif
		</div>
	</div>
	<div class="row">
		<div id="prod-desc" class="medium-18 columns">
			<p>{{ $vpa->getProdDesc() }}</p>
		</div>
	</div>
</div>
