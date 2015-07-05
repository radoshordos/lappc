<table id="simple-buybox">
    <thead>
    <tr>
        <th colspan="2" class="text-center" style="min-width: 25em">Obsah košíku</th>
    </tr>
    </thead>
    <tbody>
    @foreach($buy_order_db_items as $bodi)
        <?php
        $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($bodi->items->viewProd);
        ?>
        <tr>
            <td class="">{{$bodi->item_count}}x {{ $vpa->getProdNameWithBonus() }}</td>
            <td class="text-right">{{  $vpa->priceFormatCurrencyWith($bodi->item_count) }}</td>
        </tr>
    @endforeach
    <tr style="border-top: 1px solid #aaa">
        <td>{{  $buy_transport_name }}</td>
        <td class="text-right">{{$buy_transport_price === 0.0 ? "Zdarma" : number_format($buy_transport_price, 0, ',', ' ')." Kč"}}</td>
    </tr>
    <tr>
        <td>{{ $buy_payment_name }}</td>
        <td class="text-right">{{$buy_payment_price === 0.0 ? "Zdarma" : number_format($buy_payment_price, 0, ',', ' ')." Kč"}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr style="border-top: 1px solid #aaa">
        <td>Celkem cena s DPH</td>
        <td class="text-right"><strong>{{ number_format($total_price_order, 0, ',', ' ')}} Kč</strong></td>
    </tr>
    </tfoot>
</table>