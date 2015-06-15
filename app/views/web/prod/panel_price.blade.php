<div id="price-panel" class="panel callout radius">
    <div class="row">
        <div class="label-list">
            @if ($vpa->getPrice() >= 3000)
                <span class="label">Doprava ZDARMA</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="medium-10 columns">
            <h5>Vaše cena: <strong data-tooltip aria-haspopup="true" class="has-tip radius" title="Cena bez DPH: {{ $vpa->priceFormatCurrencyWithout(); }}">{{ $vpa->priceFormatCurrencyWith(); }}</strong></h5>

            <p>včetně DPH a všech poplatků</p>
        </div>

        <div class="row">
            <div class="medium-8 columns">
                @if (!empty($item_row))
                    {{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}
                    <input name="do-kosiku[{{ $item_row->id }}]" style="max-width: 12em" class="success button expand" type="submit" title="Vložit {{ $vpa->getProdNameWithBonus(); }} do košíku" value="Do košíku"/>
                    {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>

    <a href="#" data-reveal-id="firstModal" class="radius button">Splátková kalkulačka</a>

    <div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" seamless="false" aria-hidden="true" role="dialog">
        <iframe name="Splátková kalkulačka Homecredit" class="medium-18 columns" style="height: 50em"
                src="https://i-calc-train.homecredit.net/icalc/entry.do?shop=0999&o_price=10000&time_request=15.06.2015-20:15:08&sh=588e1b6d347b8d39776a065b499d0838"></iframe>
    </div>
</div>
