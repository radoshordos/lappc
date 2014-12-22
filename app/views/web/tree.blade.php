<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="cs"> <![endif]-->
<html class="no-js" lang="cs">

@include('web.global.blockhead')
<body>
<div id="container" style="border: 1px solid #666">
    @include('web.global.top')

    <div class="row">
        <div id="part-left" class="medium-4 columns">
            @include('web.global.leftmenu')
        </div>
        <div id="part-right" class="medium-14 columns">
            <h2>{{ $view_tree_actual->tree_desc }}</h2>

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

        </div>
    </div>


</div>
@include('web.global.scripts')
</body>
</html>