@include('web.global.blockhead')
<body>
<div id="container">
    @include('web.global.top')
    <div id="menubox" class="row">
        <h1>Nákupní košík 2 je tu</h1>

        {{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="large-18 large-centered columns">
            <div class="row">
                <div class="columns">@include('web.kosik.flow')</div>
            </div>
            <div class="row">
                <div class="columns">@include('web.kosik.order')</div>
            </div>
            <div class="row">
                <div class="columns">@include('web.kosik.items_view')</div>
            </div>
            <div class="row text-center">
                <div class="large-18 columns">{{ Form::submit('Dokončit objednávku',['name'=> 'kup-si-me','class' => 'button success']); }}</div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@include('web.global.scripts')
</body>
</html>