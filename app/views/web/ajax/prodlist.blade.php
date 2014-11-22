@foreach($prod as $row)
<li class="prod th radius">
 <a href="{{ '/'.$row->tree_absolute .'/'. $row->prod_alias }}">
<h3>{{ $row->prod_name }}</h3>
@if ($row->prod_id % 7 == 0)
<span class="akce">Šeky 40000 Kč</span>
@endif
<img src="{{ '/web/naradi/' . $row->tree_absolute .'/'. $row->prod_img_normal  }}" width="228" height="228">
@if ($row->prod_storeroom > 0)
<span class="success label">{{ $row->prod_storeroom }} ks skladem</span>
@else
<span class="secondary label">není skladem</span>
@endif
<span class="price label">{{ $row->query_price }} Kč</span>
</a>
<p>{{ $row->prod_desc }}</p>
</li>
@endforeach
