<div id="area">
    <ul id="prodlist" class="small-block-grid-3">
        @foreach($view_prod_array as $row)
            <?php
            $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($row);
            ?>
            <li class="prod th radius">
                <a href="{{ $vpa->getProdUrl(); }}">
                    <h3>{{ $vpa->getProdNameWithBonus() }}</h3>
                    @if ($vpa->getProdModeId() == 4 && !empty($vpa->getAkceMinitextName()))
                        <span class="akce">{{ $vpa->getAkceMinitextName() }}</span>
                    @endif
                    <img src="{{ $vpa->getProdImgNormalWithDir() }}" width="228" height="228">
                    @if ($vpa->getProdStoreroom() > 0)
                        <span class="success label">{{ $vpa->getProdStoreroom() }} ks skladem</span>
                    @else
                        <span class="secondary label">není skladem</span>
                    @endif
                    <span class="price label">{{ $vpa->getProdPrice() }} {{-- $pf->priceWithCurrencyWith($view_tree_actual->query_price,$view_tree_actual->prod_forex_id) --}}</span>
                </a>
                <p>{{ $vpa->getProdDesc() }}</p>
            </li>
        @endforeach
    </ul>
    @if (count($view_prod_array)>0)
        <div class="panel clearfix">
            <ul class="pagination">{{ with(new ZurbPresenter($view_prod_array))->render(); }}</ul>
        </div>
    @endif
</div>