<table id="buy-table">
	<thead>
	<tr>
		<th colspan="2">Název produktu</th>
		<th scope="column">Dostupnost</th>
		<th scope="column">Počet</th>
		<th scope="column">Cena za kus</th>
		<th scope="column">Cena celkem</th>
	</tr>
	</thead>
	<tbody>
	@foreach($buy_order_db_items as $bodi)
		<?php
		$vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($bodi->items->viewProd);
		$cena_celkem += $vpa->getPrice() * $bodi->item_count;
		?>
		<tr>
			<td><img src="{{ $vpa->getProdImgNormalWithDir() }}" alt="{{ $vpa->getProdNameWithBonus() }}" width="70" height="70"></td>
			<td style="min-width: 25em">
				{{ $vpa->getProdNameWithBonus() }}
				<p>
					<small>Kód: {{ $bodi->items->code_prod }}</small>
				</p>
			</td>
			<td><span class="success label">Skladem > 6 ks</span></td>
			<td>{{ $bodi->item_count }}</td>
			<td class="text-right">{{ $vpa->priceFormatCurrencyWith() }}</td>
			<td class="text-right">{{ $vpa->priceFormatCurrencyWith($bodi->item_count) }}</td>
		</tr>
	@endforeach
	</tbody>
	<tfoot>
	<tr>
		<td class="text-left" colspan="2">
			<small>Orientační hmotnost: {{ number_format(round($weight_sum,1), 2, ',', ' ') }} kg</small>
		</td>
		<td class="text-right" colspan="3">Celkem cena s DPH</td>
		<td class="text-right"><strong>{{ number_format($cena_celkem, 0, ',', ' ')}} Kč</strong></td>
	</tr>
	<tr>
		<td class="text-left" colspan="2"> způsob doručení</td>
		<td class="text-right" colspan="3">{{  $manipulation['buy_transport_name'] }}</td>
		<td class="text-right"><strong>{{ number_format($manipulation['buy_transport_price'], 0, ',', ' ')}} Kč</strong></td>
	</tr>
	<tr>
		<td class="text-left" colspan="2"> způsob platby</td>
		<td class="text-right" colspan="3">{{  $manipulation['buy_payment_name'] }}</td>
		<td class="text-right"><strong>{{ number_format($manipulation['buy_payment_price'], 0, ',', ' ')}} Kč</strong></td>
	</tr>
	</tfoot>
</table>
