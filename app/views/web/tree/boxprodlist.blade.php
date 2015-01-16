<div id="area">
    <ul id="prodlist" class="small-block-grid-3">
        @foreach($view_prod_array as $row)
            <?php
            $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($row);
            ?>
            <li class="prod th radius">
                <a href="{{ $vpa->getProdUrl(); }}">
                    <h3>{{ $vpa->getProdNameWithBonus() }} [{{$vpa->getProdSearchSell() }}]</h3>
                    @if ($vpa->getProdModeId() == 4 && !empty($vpa->getAkceMinitextName()))
                        <span class="akce">{{ $vpa->getAkceMinitextName() }}</span>
                    @endif
                    <img src="{{ $vpa->getProdImgNormalWithDir() }}" alt="{{ $vpa->getProdName() }}" width="240" height="240">
                    @if ($vpa->getProdModeId() > 1)
                        @if ($vpa->getProdStoreroom() > 0)
                            <span class="success label">{{ $vpa->getProdStoreroom() }} ks skladem</span>
                        @else
                            <span class="secondary label">není skladem</span>
                        @endif
                        <span class="price label">{{ $vpa->priceFormatCurrencyWith() }}</span>
                    @else
                        <span class="alert label">Prodej ukončen</span>
                    @endif
                </a>
                <p>{{ $vpa->getProdDesc() }}</p>
            </li>
        @endforeach
    </ul>
    @if (intval($view_prod_array->getTotal()) > 24)
        <div class="panel clearfix">
            <ul class="pagination">{{ with(new ZurbPresenter($view_prod_array))->render(); }}</ul>
        </div>
    @endif
</div>