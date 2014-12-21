@if (!empty($buy_order_db_items) && count($buy_order_db_items) > 0)
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
            <td class="text-right" colspan="4">Celkem cena s DPH</td>
            <td class="text-right" colspan="2"><strong>666 666,-</strong></td>
        </tr>
        </tfoot>
    </table>
@else
    <h2>Je tu prázdno</h2>
@endif