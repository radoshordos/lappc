@include('web.global.blockhead')
<body>
<div id="start">
	@include('web.global.top')
	<div class="row">
		<div id="part-left" class="medium-4 columns">
			@include('web.global.leftmenu')
		</div>
		<div id="part-right" class="medium-14 columns">
			<h1>{{ $view_tree_actual["tree_category_text"] }}</h1>

			<br />

			{{ var_dump($view_tree_actual); }}
		</div>
	</div>
	@include('web.global.footer')
	@include('web.global.scripts')
</div>
</body>
</html>