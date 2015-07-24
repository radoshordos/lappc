<div id="desc-panel" class="panel radius">
    <div class="row">
        <div class="medium-9 columns">
            <p>Výrobce: {{ $vpa->getDevName()  }}</p>

            <p>Záruka: {{ $vpa->getProdWarrantyName() }}
                <span data-tooltip aria-haspopup="true" class="has-tip" title="Ale musíte se zaregistrovat na webu">
                    <i class="fa fa-question-circle fa-lg"></i>
                </span>
            </p>
        </div>
        <div class="medium-9 columns">
            @if ($items_count == 1)
                @if (isset($items[0]->code_prod ))
                    <p>Kód: {{ $items[0]->code_prod }}</p>
                @endif
                @if (isset($items[0]->code_ean ))
                    <p>EAN: {{ $items[0]->code_ean }}</p>
                @endif
            @endif
        </div>
    </div>
    <div class="row">
        <div id="prod-desc" class="medium-18 columns">
            <p>{{ $vpa->getProdDesc() }}</p>
        </div>
    </div>
</div>