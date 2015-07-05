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
            <td>{{$bodi->item_count}}x {{ $vpa->getProdNameWithBonus() }}</td>
            <td class="text-right">{{  $vpa->priceFormatCurrencyWith($bodi->item_count) }}</td>
        </tr>
    @endforeach
    <tfoot>
    <tr style="border-top: 1px solid #aaa">
        <td>Celkem cena s DPH</td>
        <td class="text-right"><strong>{{ number_format($total_price_products, 0, ',', ' ')}} Kč</strong></td>
    </tr>
    </tfoot>
</table>