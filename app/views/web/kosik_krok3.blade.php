@include('web.global.blockhead')
<body>
<div id="start">
    @include('web.global.top')
    <div id="buy" class="row">
        <h1>Nákupní košík</h1>
        {{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="row">
            <div class="columns">@include('web.kosik.flow')</div>
        </div>
        <div class="row">
            <div class="large-11 medium-9 columns">
                <div class="row">
                    @include('web.kosik.order_all')
                </div>
            </div>
            <div class="large-7 medium-9 columns">
                <div class="row">
                    @include('web.kosik.items_view3')
                </div>
            </div>
        </div>
        <div class="row stepping">
            <div class="large-7 columns">
                <a href="/nakupni-kosik?krok=doruceni-a-zpusoby-platby" class="button info">&lArr; Způsob doručení a platby</a>
            </div>
            <div class="large-11 columns">
                {{ Form::submit('&rArr; Dokončit objednávku',['name'=> 'dokonceni-objednavky','class' => 'button success']); }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
    @include('web.global.footer')
    @include('web.global.scripts')
</div>
</body>
</html>