<ul class="breadcrumbs">@if (isset($vt_tree))
        <li><a href="#">Úvod</a></li>{{ $vt_tree->tree_category_nav  }}@if (isset($vp))
            <li><a href="{{ '/'. $vp->tree_absolute.'/'. $vp->prod_alias }}">{{ $vp->prod_name }}</a></li>@endif @endif</ul>