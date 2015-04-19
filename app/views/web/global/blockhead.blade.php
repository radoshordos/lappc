<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="cs" prefix="og: http://ogp.me/ns#"><![endif]-->
<html class="no-js" lang="cs" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Radek Horáček - hordos[@]centrum[.]cz">
    @if ($namespace == 'tree' && !empty($dev_actual))
        <title>{{ $view_tree_actual['tree_desc']." ".$dev_actual['name']}} | Guru nářadí</title>
        <meta name="keywords" content="{{ $view_tree_actual['tree_desc'].", ".$dev_actual['name'] }}">
        <meta name="description" content="{{ $view_tree_actual['tree_desc'] }} v eshopu guru-naradi.cz">
    @elseif ($namespace == 'tree')
        <title>{{ $view_tree_actual['tree_desc'] }} | Guru nářadí</title>
        <meta name="keywords" content="{{ $view_tree_actual['tree_desc'] }}">
        <meta name="description" content="{{ $view_tree_actual['tree_desc'] }} skladem s rychlým doručením v eshopu guru-naradi.cz">
    @elseif ($namespace == 'prod')
        <title>{{ $view_prod_actual->prod_name }} | Guru nářadí</title>
        <meta name="keywords" content="{{ $view_prod_actual->prod_name.", ".$view_prod_actual->tree_name.", ".$view_prod_actual->dev_name }}">
        <meta name="description" content="{{ $view_prod_actual->prod_desc }} v eshopu guru-naradi.cz">
        <meta property="og:title" content="{{ $view_prod_actual->prod_name }}"/>
        <meta property="og:description" content="{{ $view_prod_actual->prod_desc }}">
        <meta property="og:type" content="product">
        <meta property="og:url" content="http://localhost:8000/{{$view_prod_actual->tree_absolute}}/{{$view_prod_actual->prod_alias}}">
        <meta property="og:image" content="http://localhost:8000/web/naradi/{{$view_prod_actual->tree_absolute}}/{{$view_prod_actual->prod_img_normal}}"/>
        <meta property="og:site_name" content="Nářadí Doležalová s.r.o e-shop: www.guru-naradi.cz">
    @else
        <title>Guru nářadí</title>
    @endif
	<link rel="stylesheet" href="/web/my/public/style/css/guru.min.css">
    <link rel="stylesheet" href="/web/my/layout.css">
    <link rel="stylesheet" href="/web/my/tree.css">
    <link rel="stylesheet" href="/web/my/product.css">
    <link rel="stylesheet" href="/web/my/kosik.css">
</head>