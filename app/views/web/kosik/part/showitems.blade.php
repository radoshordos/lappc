@if (!empty($record_items_purchased))
    <table id="buy-table">
        <tr>
            <th colspan="2">název</th>
            <th scope="column">dostupnost</th>
            <th scope="column">počet</th>
            <th scope="column">cena za kus</th>
            <th scope="column">cena celkem</th>
        </tr>
        @foreach($record_items_purchased as $rip)
            <tr>
                <td><img src="{{ '/web/naradi/' . $rip->viewProd->tree_absolute .'/'. $rip->viewProd->prod_img_normal  }}" width="70" height="70"></td>
                <td style="width: 30em">
                    <a href="{{ '/' . $rip->viewProd->tree_absolute .'/'. $rip->viewProd->prod_alias }}">{{ $rip->viewProd->prod_name }}</a>
                    <p><small>Kód: {{ $rip->items->code_prod }}</small></p>
                </td>
                <td>Skladem: > 6 ks</td>
                <td>{{ Form::number("item_count[".$rip->id."]",$rip->item_count,['min' => 1, 'max' => 99, 'required' => 'required']); }}</td>
                <td class="text-right">{{ $pf->priceWithCurrencyWith($rip->viewProd->query_price,$rip->viewProd->prod_forex_id) }}</td>
                <td class="text-right">{{ $pf->priceWithCurrencyWith($rip->viewProd->query_price * $rip->item_count,$rip->viewProd->prod_forex_id) }}</td>
            </tr>
        @endforeach
    </table>

    @else
    <h2>Je tu prázdno</h2>

@endif