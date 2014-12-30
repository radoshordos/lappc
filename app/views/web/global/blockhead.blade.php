<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="cs"><![endif]-->
<html class="no-js" lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($view_tree_actual) && isset($db_dev))
        <title>{{ $view_tree_actual->tree_desc." ".$db_dev->name}} | Guru nářadí</title>
        <meta name="keywords" content="{{ $view_tree_actual->tree_desc.", ".$db_dev->name }}">
        <meta name="keywords" content="{{ $view_tree_actual->tree_desc }}">
    @elseif (!empty($db_dev))
        <title>Hello, {{ $db_dev->name }}</title>
    @elseif (isset($view_prod_actual))
        <title>{{ $view_prod_actual->prod_name }} | Guru nářadí</title>
        <meta name="description" content="{{ $view_prod_actual->prod_desc }}">
        <meta name="keywords" content="{{ $view_prod_actual->prod_name.", ".$view_prod_actual->tree_name.", ".$view_prod_actual->dev_name }}">
    @else
        <title>Guru nářadí</title>
    @endif
    <link rel="stylesheet" href="/web/components/foundation/css/normalize.css">
    <link rel="stylesheet" href="/web/components/foundation/css/foundation.css">
    <link rel="stylesheet" href="/web/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/components/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/web/components/colorbox/colorbox.css">
    <link rel="stylesheet" href="/web/my/layout.css">
    <link rel="stylesheet" href="/web/my/tree.css">
    <link rel="stylesheet" href="/web/my/product.css">
    <link rel="stylesheet" href="/web/my/kosik.css">

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgGUy-fZH3M2kZPJtAQ4CsdJHRu0KtZG4"></script>
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {center: {lat: -34.397, lng: 150.644}, zoom: 8};
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
