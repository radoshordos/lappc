<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (!empty($db_dev))
    <title>Hello, {{ $db_dev->name }}</title>
    @else
    <title>Hello, world!</title>
    @endif
    <link rel="stylesheet" href="/web/components/foundation/css/normalize.css">
    <link rel="stylesheet" href="/web/components/foundation/css/foundation.css">
    <link rel="stylesheet" href="/web/components/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/web/my/app.css">
    <link rel="stylesheet" href="/web/my/jtree.css">
</head>