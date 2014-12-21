@if (!empty($buy_order_db_items) && count($buy_order_db_items) > 0)
    <div class="small-11 large-centered columns">
        <div class="row">
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
                    <tr>
                        <td><img src="{{ '/web/naradi/' . $bodi->items->viewProd->tree_absolute .'/'. $bodi->items->viewProd->prod_img_normal  }}" alt="{{ $bodi->items->viewProd->prod_name }}" width="70" height="70"></td>
                        <td style="width: 30em">
                            {{ $bodi->items->viewProd->prod_name }}
                            <p>
                                <small>Kód: {{ $bodi->items->code_prod }}</small>
                            </p>
                        </td>
                        <td>Skladem: > 6 ks</td>
                        <td>{{ $bodi->item_count }}</td>
                        <td class="text-right">{{-- $pf->priceWithCurrencyWith($bodi->viewProd->query_price,$bodi->viewProd->prod_forex_id) --}}</td>
                        <td class="text-right">{{-- $pf->priceWithCurrencyWith($bodi->viewProd->query_price * $bodi->item_count,$bodi->viewProd->prod_forex_id) --}}</td>
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
        </div>
    </div>
@else
    <h2>Je tu prázdno</h2>
@endif