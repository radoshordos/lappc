@include('web.global.blockhead')
<body>
<div id="start">
	@include('web.global.top')
	<div id="buy" class="row">
		<h1>Nákupní košík</h1>
		{{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}
		<div class="large-18 large-centered columns">
			<div class="row">
				<div class="columns">@include('web.kosik.flow')</div>
			</div>
			<div class="row">
				<div class="columns">@include('web.kosik.order_all')</div>
			</div>
			<div class="row stepping">
				<div class="large-9 columns">
					<a href="/nakupni-kosik" class="button info">&lArr; Zpět k obsahu košíku</a>
				</div>
				<div class="large-9 columns text-right">{{ Form::submit('&rArr; Kontrola objednávky',['name'=> 'zkontroluj-si-me','class' => 'button success']); }}</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
	@include('web.global.footer')
	@include('web.global.scripts')
</div>
</body>
</html>