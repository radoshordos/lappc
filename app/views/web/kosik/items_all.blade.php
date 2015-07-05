<table id="buy-table" role="grid">
    <thead>
    <tr>
        <th colspan="2">Název produktu</th>
        <th scope="column">Dostupnost</th>
        <th class="text-center" scope="column">Počet</th>
        <th class="text-right" scope="column">Cena za kus</th>
        <th class="text-right" scope="column">Cena celkem</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($buy_order_db_items as $bodi)
        <?php
        $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($bodi->items->viewProd);
        ?>
        <tr>
            <td class="small-2"><img src="{{ $vpa->getProdImgNormalWithDir() }}" alt="{{ $vpa->getProdNameWithBonus() }}" width="70" height="70"></td>
            <td class="small-7">
                <a href="{{ $vpa->getProdUrl(); }}">{{ $vpa->getProdNameWithBonus() }}</a>
                <p>
                    <small>Kód: {{ $bodi->items->code_prod }}</small>
                </p>
            </td>
            <td class="small-2"><span class="default label">Skladem > 6 ks</span></td>
            <td class="small-2">{{ Form::number("item_count[".$bodi->id."]",$bodi->item_count,['min' => 1, 'max' => 99, 'step' => 1, 'required' => 'required']); }}</td>
            <td class="small-2 text-right">{{ $vpa->priceFormatCurrencyWith() }}</td>
            <td class="small-2 text-right">{{ $vpa->priceFormatCurrencyWith($bodi->item_count) }}</td>
            <td class="small-1">
                <a title="Odstranit položku {{ $bodi->items->viewProd->prod_name }} z košíku" href="?delete-buy-item={{ $bodi->id }}" class="delete-alert"><i class="fa fa-times fa-lg"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td class="text-left" colspan="2">
            <small>Orientační hmotnost: {{ number_format(round($weight_sum,1), 2, ',', ' ') }} kg</small>
        </td>
        <td class="text-right" colspan="4">Celkem cena s DPH <strong>{{ number_format($total_price_products, 0, ',', ' ')}} Kč</strong></td>
        <td></td>
    </tr>
    </tfoot>
</table>

