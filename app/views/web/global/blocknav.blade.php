@if (isset($view_tree))
    <ul class="breadcrumbs">
        <li><a href="/">Úvod</a></li>{{ $view_tree['tree_category_nav'] }}
        @if (isset($view_prod_actual))
            <li><a href="{{ '/'. $view_prod_actual->tree_absolute.'/'. $view_prod_actual->prod_alias }}">{{ $view_prod_actual->prod_name }}</a></li>
        @endif
    </ul>
@else
    <p class="breadcrumbs" >Výtejte v Guru-naradi.cz, internetovím obchodu firmy Nářadi Dolezalova s.r.o v Benešově</p>
@endif