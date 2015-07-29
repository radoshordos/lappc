@include('web.global.blockhead')
<body>
<div class="row">
    <div class="large-18" id="begin">
        @include('web.global.top')
        <div class="row">
            <div id="part-left" class="medium-4 columns">
                @include('web.global.leftmenu')
            </div>
            <div id="part-right" class="medium-14 columns">
                @if (strlen($term)>0)
                    <h1>Hledáme výraz + <strong>{{ $term }}</strong></h1>
                    <div class="small-18 panel clearfix valign-middle">
                        <div class="row">
                            @include('web.tree.boxdev')
                        </div>
                        <div class="row" style="border-top: 5px solid #ffffff">
                            <div id="prod-filter" class="small-3 columns">
                                @include('web.tree.blockprodfilter')
                            </div>
                            <div id="prod-sort" class="small-6 columns">
                                @include('web.tree.boxsorting')
                            </div>
                        </div>
                    </div>
                    @include('web.tree.boxprodlist')
                @else
                    <h1>Zadejte výraz pro vyhledání zboží</h1>
                @endif
            </div>
        </div>
        @include('web.global.footer')
        @include('web.global.scripts')
    </div>
</div>
</body>
</html>