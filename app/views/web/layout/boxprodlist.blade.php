<div id="area">
    <ul id="prodlist" class="small-block-grid-3">
        @foreach($vp_list as $row)
        <li class="prod th radius">
            <a href="{{ '/'.$row->tree_absolute .'/'. $row->prod_alias }}">
                <h3>{{ $row->query_name }}</h3>
                @if ($row->prod_mode_id == 4 && !empty($row->akce_minitext_name))
                    <span class="akce">{{ $row->akce_minitext_name; }}</span>
                @endif
                <img src="{{ '/web/naradi/' . $row->tree_absolute .'/'. $row->prod_img_normal  }}" width="228" height="228">
                @if ($row->prod_storeroom > 0)
                    <span class="success label">{{ $row->prod_storeroom }} ks skladem</span>
                @else
                    <span class="secondary label">není skladem</span>
                @endif
                <span class="price label">{{ $pf->priceWithCurrencyWith($row->query_price,$row->prod_forex_id) }}</span>
            </a>
            <p>{{ $row->prod_desc }}</p>
        </li>
        @endforeach
    </ul>
    @if (count($vp_list)>0)
    <div class="panel clearfix">
        <ul class="pagination">{{ with(new ZurbPresenter($vp_list))->render(); }}</ul>
    </div>
    @endif
</div>