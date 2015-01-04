@include('web.global.blockhead')
<body>
<div id="container">
    @include('web.global.top')
    <div class="row">
        <div id="part-left" class="medium-4 columns">
            @include('web.global.leftmenu')
        </div>
        <div id="part-right" class="medium-14 columns">
            @if (strlen($term)>0)
                <h1>Hledáme výraz + {{ $term }}</h1>
                <div class="small-18 panel clearfix valign-middle">
                    <div class="row">
                        <dl id="dev-container" class="small-6 columns sub-nav">
                            @include('web.tree.boxdev')
                        </dl>
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
</div>
@include('web.global.footer')
@include('web.global.scripts')
</body>
</html>