<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="cs"> <![endif]-->
<html class="no-js" lang="cs">

@include('web.global.blockhead')
<body>
<h1>Hello, world!</h1>
Registrace & Přihlášení
<div id="container" style="border: 1px solid #666">
    @include('web.global.top')

    <div id="menubox" class="row">
        <h1>Nákupní košík je tu</h1>
        @include('web.kosik.items')
        @include('web.kosik.order')
        <div class="row">
            <div class="large-6 columns">@include('web.kosik.delivery')</div>
            <div class="large-6 columns">@include('web.kosik.payment')</div>
        </div>
        <div class="row">
            <div class="large-12 columns text-center">
            {{ Form::open(['action' => 'KosikController@create','class' => 'form-horizontal', 'role' => 'form']) }}
            {{ Form::submit('Dokončit objednávku',['name'=> 'buy','class' => 'button success']); }}
            {{ Form::close(); }}
            </div>
        </div>
    </div>
</div>
<script src="/web/guru.js"></script>
<script src="/web/js/ajax.js"></script>
</body>
</html>