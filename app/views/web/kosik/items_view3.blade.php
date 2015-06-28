<table id="buy-table">
    <tbody>
    @foreach($buy_order_db_items as $bodi)
        <?php
        $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($bodi->items->viewProd);
        ?>
        <tr>
            <td class="small-2"><img src="{{ $vpa->getProdImgNormalWithDir() }}" alt="{{ $vpa->getProdNameWithBonus() }}" width="70" height="70"></td>
            <td class="small-7">
                {{ $vpa->getProdNameWithBonus() }}
                <p>
                    <small>Kód: {{ $bodi->items->code_prod }}</small>
                </p>
            </td>
            <td class="small-2 text-right">{{ $vpa->priceFormatCurrencyWith() }}</td>
            <td class="small-3 text-right">{{ $vpa->priceFormatCurrencyWith($bodi->item_count) }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td class="text-left" colspan="2">
            <small>Orientační hmotnost: {{ number_format(round($weight_sum,1), 2, ',', ' ') }} kg</small>
        </td>
        <td class="text-right" colspan="3">Celkem cena s DPH</td>
        <td class="text-right"><strong>{{ number_format($total_price_products, 0, ',', ' ')}} Kč</strong></td>
    </tr>
    <tr>
        <td class="text-left" colspan="2"> způsob doručení</td>
        <td class="text-right" colspan="3">{{  $buy_transport_name }}</td>
        <td class="text-right"><strong>{{ number_format($buy_transport_price, 0, ',', ' ')}} Kč</strong></td>
    </tr>
    <tr>
        <td class="text-left" colspan="2"> způsob platby</td>
        <td class="text-right" colspan="3">{{  $buy_payment_name }}</td>
        <td class="text-right"><strong>{{ number_format($buy_payment_price, 0, ',', ' ')}} Kč</strong></td>
    </tr>
    </tfoot>
</table>
