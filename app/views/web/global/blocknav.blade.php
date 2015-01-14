<ul class="breadcrumbs">@if (isset($view_tree_actual))
        <li><a href="/">Úvod</a></li>{{ $view_tree_actual['tree_category_nav'] }}@if (isset($view_prod_actual))
            <li><a href="{{ '/'. $view_prod_actual->tree_absolute.'/'. $view_prod_actual->prod_alias }}">{{ $view_prod_actual->prod_name }}</a></li>@endif @endif</ul>