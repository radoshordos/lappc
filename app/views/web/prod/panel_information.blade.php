<div id="desc-panel" class="panel radius">
    <div class="row">
        <div class="medium-10 columns">
            <h6 class="storeroom"><i class="fa fa-home"></i> V obchodě:<strong> {{ $vpa->getProdStoreroom() + 4 }} ks</strong></h6>
			<h6 class="storeroom"><i class="fa fa-truck"></i> Centrální sklad:<strong> {{ $vpa->getProdStoreroom() + 12 }} ks</strong></h6>
            <p>Zboží připraveno k expedici</p>
            <?php
            $date = new \DateTime();
            $date->add(DateInterval::createFromDateString('tomorrow'));
            ?>
            <p class="date-exp"><span data-tooltip aria-haspopup="true" class="has-tip radius" title="Zboží expedujeme kolem 14h">K Vám dorazí: <span>{{ $date->format('j.m.Y'); }}</span></span></p>
        </div>
        <div class="medium-8 columns">
            <p>Výrobce: {{ $vpa->getDevName()  }}</p>
            <p>Záruka: {{ $vpa->getProdWarrantyName() }} <span data-tooltip aria-haspopup="true" class="has-tip" title="Ale musíte se zaregistrovat na webu"><i class="fa fa-question-circle fa-lg"></i></span></p>
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