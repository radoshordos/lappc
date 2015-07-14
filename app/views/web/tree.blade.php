@include('web.global.blockhead')
<body>
<div id="start">
	@include('web.global.top')
	<div class="row">
		<div id="part-left" class="medium-4 columns">
			@include('web.global.leftmenu')
		</div>
        <div id="part-right" class="medium-14 large-14 columns">
			<h1>{{ $view_tree_actual['tree_desc'] }}</h1>
			<div id="tree-panel" class="small-18 panel radius clearfix valign-middle">
				<div class="row">
                    <ul id="dev-container" class="small-block-grid-3 medium-block-grid-4 large-block-grid-5">
						@include('web.tree.boxdev')
					</ul>
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
</div>
</body>
</html>