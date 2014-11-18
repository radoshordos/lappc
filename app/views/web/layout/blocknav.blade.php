<ul class="breadcrumbs">
    <li><a href="#">Úvod</a></li>
    <li><a href="#">Akumulátorové nářadí</a></li>
    <li><a href="#">Aku kladiva</a></li>
    @if (isset($vp))
    <li><a href="{{ '/'. $vp->tree_absolute.'/'. $vp->prod_alias }}">{{ $vp->prod_name }}</a></li>
    @endif
</ul>