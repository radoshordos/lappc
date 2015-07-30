@include('web.global.blockhead')
<body>
<div class="row">
    <div class="large-18" id="begin">
        @include('web.global.top')
        <div class="row">
            <div id="part-left" class="medium-4 columns">
                @include('web.global.leftmenu')
            </div>
            <div id="part-right" class="medium-14 large-14 columns">
                <h1>{{ $view_tree_actual['tree_desc'] }}</h1>
                <div id="tree-panel" class="small-18 panel radius clearfix valign-middle">
                    <div class="row">
                        @include('web.tree.boxdev')
                    </div>
                    <div class="row">
                        <div id="prod-filter" class="small-10 medium-6 large-6 columns">
                            @include('web.tree.blockprodfilter')
                        </div>
                        <div id="prod-sort" class="small-8 medium-12 large-11 columns">
                            <div class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
                                @include('web.tree.boxsorting')
                            </div>
                        </div>
                    </div>
                </div>
                @include('web.tree.boxprodlist')
            </div>
        </div>
        @include('web.global.footer')
        @include('web.global.scripts')
    </div>
</div>
</body>
</html>