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
            <div class="large-11 columns">
                <div class="row" id="delivery">
                    @include('web.kosik.delivery')
                </div>
                <div class="row" id="payment">
                    @include('web.kosik.payment')
                </div>
                <div class="row stepping">
                    <div class="large-9 columns">
                        <a href="/nakupni-kosik" class="button info">&lArr; Zpět k obsahu košíku</a>
                    </div>
                    <div class="large-9 columns text-right">
                        {{ Form::submit('&rArr; Vaše kontaktní informace',['name'=> 'kontaktni-informace','class' => 'button success']); }}
                    </div>
                </div>
            </div>
            <div class="large-7 columns">
                    @include('web.kosik.items_view2')
            </div>
        </div>
        {{ Form::close() }}
    </div>
    @include('web.global.footer')
    @include('web.global.scripts')
</div>
</body>
</html>