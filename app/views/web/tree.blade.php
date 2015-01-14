@include('web.global.blockhead')
<body>
@include('web.global.top')
<div class="row">
    <div id="part-left" class="medium-4 columns">
        @include('web.global.leftmenu')
    </div>
    <div id="part-right" class="medium-14 columns">
        <h1>{{ $view_tree_actual['tree_desc'] }}</h1>

        <div id="tree-panel" class="small-18 panel clearfix valign-middle">
            <div class="row">
                <dl id="dev-container" class="small-6 columns sub-nav">
                    @include('web.tree.boxdev')
                </dl>
            </div>
            <div class="row">
                <div id="prod-filter" class="small-3 columns">
                    @include('web.tree.blockprodfilter')
                </div>
                <div id="prod-sort" class="small-6 columns">
                    @include('web.tree.boxsorting')
                </div>
            </div>
        </div>
        @include('web.tree.boxprodlist')
    </div>
</div>
@include('web.global.footer')
@include('web.global.scripts')
</body>
</html>