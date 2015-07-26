<div id="price-panel" class="panel callout radius">

    <div class="row">
        <div class="label-list">
            @if ($vpa->getPrice() >= 3000)
                <span class="label">Doprava ZDARMA</span>
            @endif
        </div>
    </div>
    <div class="row">
        <h5>Vaše cena: <strong data-tooltip aria-haspopup="true" class="has-tip radius" title="Cena bez DPH: {{ $vpa->priceFormatCurrencyWithout(); }}">{{ $vpa->priceFormatCurrencyWith(); }}</strong></h5>

        <p>včetně DPH a všech poplatků</p>
    </div>
    <div class="row">
        @if (!empty($items))
            {{ Form::open(['action' => 'KosikController@store', 'class' => 'form-horizontal', 'role' => 'form']) }}
            @if ($items_count == 1)
                <input name="do-kosiku[{{--$items[0]->id --}}]" style="max-width: 12em" class="success button expand" type="submit" title="Vložit {{ $vpa->getProdNameWithBonus(); }} do košíku" value="Do košíku"/>
            @endif
            {{ Form::close() }}
        @endif
    </div>

    <div class="row">
        @if (is_array($prod_difference) && $prod_difference_column > 0)
            @include('web.prod.variation')
        @endif
    </div>

    <div class="row">
        <a href="#" data-reveal-id="firstModal" class="radius button">Splátková kalkulačka</a>

        <div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" seamless="false" aria-hidden="true" role="dialog">
            <iframe name="Splátková kalkulačka Homecredit" class="medium-18 columns" style="height: 50em"
                    src="https://i-calc-train.homecredit.net/icalc/entry.do?shop=0999&o_price=10000&time_request=15.06.2015-20:15:08&sh=588e1b6d347b8d39776a065b499d0838"></iframe>
        </div>
    </div>
</div>