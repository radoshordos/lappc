@include('web.global.blockhead')
<body>
<div id="start">
    @include('web.global.top')
    <div id="buy" class="row">
        <h1>Nákupní košík</h1>
        {{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="row">
            @if (!empty($buy_order_db_items) && count($buy_order_db_items) > 0)
                <div class="row">
                    <div class="columns">@include('web.kosik.flow')</div>
                </div>
                <div class="row">
                    @include('web.kosik.items_all')
                </div>
                <div class="row stepping">
                    <div class="small-9 large-9 columns">
                        @if (!empty($item_new))
                            <a href="{{ '/' . $item_new->items->viewProd->tree_absolute .'/'. $item_new->items->viewProd->prod_alias }}" class="button info">&lArr; Zpět k produktu</a>
                        @endif
                    </div>
                    <div class="small-9 large-9 columns text-right">
                        {{ Form::submit('&rArr; Doručení a způsoby platby',['name'=> 'doruceni-a-zpusoby-platby','class' => 'button success']); }}
                    </div>
                </div>
            @else
                <p class="panel" class="text-center">
                    <strong>Nákupní košík je prázdný</strong>
                </p>
            @endif
        </div>
        {{ Form::close() }}
    </div>
    @include('web.global.footer')
    @include('web.global.scripts')
</div>
</body>
</html>