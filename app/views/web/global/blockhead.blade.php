<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($vt_tree) && isset($db_dev))
        <title>{{ $vt_tree->tree_desc." ".$db_dev->name}}</title>
    @elseif (!empty($db_dev))
        <title>Hello, {{ $db_dev->name }}</title>
    @elseif (!empty($vp))
        <title>{{ $vp->prod_name }}</title>
    @else
        <title>Hello, world!</title>
    @endif
    @if (isset($vt_tree) && isset($db_dev))
        <meta name="keywords" content="{{ $vt_tree->tree_desc.", ".$db_dev->name }}">
    @elseif (isset($vt_tree))
        <meta name="keywords" content="{{ $vt_tree->tree_desc }}">
    @elseif (isset($vp))
        <meta name="description" content="{{ $vp->prod_desc }}">
        <meta name="keywords" content="{{ $vp->prod_name.", ".$vp->tree_name.", ".$vp->dev_name }}">
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

</head>