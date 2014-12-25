@include('web.global.blockhead')
<body>
<div id="container">
    @include('web.global.top')
    <div id="menubox" class="row">
        <h1>Nákupní košík 1 je tu</h1>
        {{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="small-18 large-centered columns">
            <div class="row">
                <div class="columns">@include('web.kosik.flow')</div>
            </div>
            @if (!empty($buy_order_db_items) && count($buy_order_db_items) > 0)
                <div class="row">
                    <div class="columns">@include('web.kosik.items_all')</div>
                </div>
                <div class="row">
                    <div class="large-9 columns">@include('web.kosik.delivery')</div>
                    <div class="large-9 columns">@include('web.kosik.payment')</div>
                </div>
                <div class="row">
                    <div class="large-6 columns">
                        @if (!empty($item_new))
                            <a href="{{ '/' . $item_new->items->viewProd->tree_absolute .'/'. $item_new->items->viewProd->prod_alias }}" class="button info">Zpět k produktu</a>
                        @endif
                    </div>
                    <div class="large-12 columns text-right">{{ Form::submit('Zadej kontakt',['name'=> 'zadej-kontakt','class' => 'button success']); }}</div>
                </div>
            @else
                <h2>Je tu prázdno</h2>
            @endif
        </div>
        {{ Form::close() }}
    </div>
</div>
@include('web.global.scripts')
</body>
</html>