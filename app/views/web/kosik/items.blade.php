@if (!empty($record_items_purchased) && count($record_items_purchased) > 0)
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
        @foreach($record_items_purchased as $rip)
            <tr>
                <td><img src="{{ '/web/naradi/' . $rip->viewProd->tree_absolute .'/'. $rip->viewProd->prod_img_normal  }}" alt="{{ $rip->viewProd->prod_name }}" width="70" height="70"></td>
                <td style="width: 30em">
                    <a href="{{ '/' . $rip->viewProd->tree_absolute .'/'. $rip->viewProd->prod_alias }}">{{ $rip->viewProd->prod_name }}</a>

                    <p>
                        <small>Kód: {{ $rip->items->code_prod }}</small>
                    </p>
                </td>
                <td>Skladem: > 6 ks</td>
                <td>{{ Form::number("item_count[".$rip->id."]",$rip->item_count,['min' => 1, 'max' => 99, 'step' => 1, 'required' => 'required']); }}</td>
                <td class="text-right">{{-- $pf->priceWithCurrencyWith($rip->viewProd->query_price,$rip->viewProd->prod_forex_id) --}}</td>
                <td class="text-right">{{-- $pf->priceWithCurrencyWith($rip->viewProd->query_price * $rip->item_count,$rip->viewProd->prod_forex_id) --}}</td>
                <td>
                    <a title="Odstranit položku {{ $rip->viewProd->prod_name }} z košíku" href="?delete-buy-item={{ $rip->id }}" class="delete-alert"><i class="fa fa-times fa-lg"></i></a>
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
@else
    <h2>Je tu prázdno</h2>
@endif