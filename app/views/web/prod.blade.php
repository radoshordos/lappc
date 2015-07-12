@include('web.global.blockhead')
<body>
<div id="start">
	@include('web.global.top')
	<?php $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($view_prod_actual); ?>
	<div class="row">
		<div id="part-left" class="large-4 columns">
			@include('web.global.leftmenu')
		</div>
		<div id="part-right" class="large-14 columns">
			<h1>{{ $vpa->getProdNameWithBonus(); }}</h1>
    		@include('web.prod.blok_top')
		</div>
	</div>
	@include('web.global.footer')
	@include('web.global.scripts')
</div>
</body>
</html>