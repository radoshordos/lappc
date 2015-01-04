<div id="price-panel" class="panel callout radius">
    <div class="row">
        <div class="medium-12 columns">
            <div class="label-list">
                @if ($vpa->getPrice() >= 3000)
                    <span class="label">Doprava ZDARMA</span>
                @endif
            </div>
        </div>
        <div class="medium-10 columns">
            <h5>Vaše cena: <strong data-tooltip aria-haspopup="true" class="has-tip radius" title="Cena bez DPH: {{ $vpa->priceFormatCurrencyWithout(); }}">{{ $vpa->priceFormatCurrencyWith(); }}</strong></h5>
            <p>včetně DPH a všech poplatků</p>
        </div>
        <div class="medium-8 columns">
            @if (!empty($item_row))
                {{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}
                <input name="do-kosiku[{{ $item_row->id }}]" style="max-width: 12em" class="success button expand" type="submit" title="Vložit {{ $vpa->getProdNameWithBonus(); }} do košíku" value="Do košíku"/>
                {{ Form::close() }}
            @endif
        </div>
    </div>
</div>