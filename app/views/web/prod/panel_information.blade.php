<div id="desc-panel" class="panel radius">
    <div class="row">
        <div class="medium-10 columns">
            <h5 class="storeroom">Skladem:<strong> > {{ $vpa->getProdStoreroom() + 4 }} ks</strong></h5>
            <p>Zboží připraveno k expedici</p>
            <?php
            $date = new \DateTime();
            $date->add(DateInterval::createFromDateString('tomorrow'));
            ?>
            <p class="date-exp"><span data-tooltip aria-haspopup="true" class="has-tip radius" title="Zboží expedujeme kolem 14h">K Vám dorazí: <span>{{ $date->format('j.m.Y'); }}</span></span></p>
        </div>
        <div class="medium-8 columns">
            <p>Výrobce: {{ $vpa->getDevName()  }}</p>
            <p>Záruka: {{ $vpa->getProdWarrantyName() }}</p>
            @if (!empty($item_row))
                @if (isset($item_row->code_prod ))
                    <p>Kód: {{ $item_row->code_prod }}</p>
                @endif
                @if (isset($item_row->code_ean ))
                    <p>EAN: {{ $item_row->code_ean }}</p>
                @endif
            @endif
        </div>
    </div>
</div>