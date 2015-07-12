<div id="area">
    <ul id="prodlist" class="small-block-grid-2 medium-block-grid-2 large-block-grid-3">
        @foreach($view_prod_array as $row)
            <?php
            $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($row);
            ?>
            <li class="th small-6">
                <a href="{{ $vpa->getProdUrl(); }}">
                    <h3>{{ $vpa->getProdNameWithBonus() }}</h3>
                    @if ($vpa->getProdModeId() == 4 && !empty($vpa->getAkceMinitextName()))
                        <span class="akce">{{ $vpa->getAkceMinitextName() }}</span>
                    @endif

                    <div class="row text-center">
                        <img class="small-18" src="{{ $vpa->getProdImgNormalWithDir() }}" alt="{{ $vpa->getProdName() }}" width="240" height="240">
                    </div>

                    <div class="row">
                        @if ($vpa->getProdModeId() > 1)
                            @if ($vpa->getProdStoreroom() > 0)
                                <span class="success label small-9 columns">{{ $vpa->getProdStoreroom() }} ks skladem</span>
                            @else
                                <span class="secondary label small-9 columns">není skladem</span>
                            @endif
                            <span class="price label small-9 columns">{{ $vpa->priceFormatCurrencyWith() }}</span>
                        @else
                            <span class="alert label small-9 columns">Prodej byl ukončen</span>
                        @endif
                    </div>
                </a>

                <div class="row">
                    <p class="small-18">{{ $vpa->getProdDesc() }}</p>
                </div>
            </li>
        @endforeach
    </ul>
    @if (intval($view_prod_array->getTotal()) > 24)
        <div class="panel clearfix">
            <ul class="pagination">{{ with(new ZurbPresenter($view_prod_array))->render(); }}</ul>
        </div>
    @endif
</div>