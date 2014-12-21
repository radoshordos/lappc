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
                    <th><i class="fa fa-times"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($buy_order_db_items as $bodi)
                    <tr>
                        <td><img src="{{ '/web/naradi/' . $bodi->items->viewProd->tree_absolute .'/'. $bodi->items->viewProd->prod_img_normal  }}" alt="{{ $bodi->items->viewProd->prod_name }}" width="70" height="70"></td>
                        <td style="width: 30em">
                            <a href="{{ '/' . $bodi->items->viewProd->tree_absolute .'/'. $bodi->items->viewProd->prod_alias }}">{{ $bodi->items->viewProd->prod_name }}</a>

                            <p>
                                <small>Kód: {{ $bodi->items->code_prod }}</small>
                            </p>
                        </td>
                        <td>Skladem: > 6 ks</td>
                        <td>{{ Form::number("item_count[".$bodi->id."]",$bodi->item_count,['min' => 1, 'max' => 99, 'step' => 1, 'required' => 'required']); }}</td>
                        <td class="text-right">{{-- $pf->priceWithCurrencyWith($bodi->viewProd->query_price,$bodi->viewProd->prod_forex_id) --}}</td>
                        <td class="text-right">{{-- $pf->priceWithCurrencyWith($bodi->viewProd->query_price * $bodi->item_count,$bodi->viewProd->prod_forex_id) --}}</td>
                        <td>
                            <a title="Odstranit položku {{ $bodi->items->viewProd->prod_name }} z košíku" href="?delete-buy-item={{ $bodi->id }}" class="delete-alert"><i class="fa fa-times fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td class="text-left" colspan="2">
                        <a href="">
                            <small>Mám slevový kód</small>
                        </a>
                    </td>
                    <td class="text-right" colspan="3">Celkem cena s DPH</td>
                    <td class="text-right" colspan="2"><strong>666 666,-</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@else
    <h2>Je tu prázdno</h2>
@endif