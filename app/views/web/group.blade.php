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



			<ul id="category-list" class="small-block-grid-2 medium-block-grid-4 large-block-grid-6">
			@foreach($picture_tree as $val)
					<li><a href="{{ $val->absolute }}"><h3>{{ $val->name }}</h3><img src="/web/img/category/{{ $val->picture }}" alt=""/></a></li>
			@endforeach
			</ul>
			<br />
			<br />

			<div class="row">
				<div class="medium-5 columns">
					<div class="callout-card">
						<div class="card-label">
							<div class="label-text">
								TOP 2
							</div>
						</div>
						<div class="callout-card-content">
							<h3 class="lead"> Avengers: Age of Ultron </h3>
							<img src="/web/naradi/aku-program/makita-uh200dz.jpg" alt="death star"/>
							<p>Akumulátorová okružní pila Makita BSS500RFE 14,4V Li-Ion, 3Ah</p>
						</div>
					</div>
				</div>
				<div class="medium-8 columns">
					<div class="callout-card alert">
						<div class="card-label">
							<div class="label-text">
								TOP 1
							</div>
						</div>
						<div class="callout-card-content">
							<h3 class="lead">Makita BUM168Z</h3>
							<img src="/web/naradi/aku-program/makita-uh200dz.jpg" alt="death star"/>
							<p>Akumulátorová okružní pila Makita BSS500RFE 14,4V Li-Ion, 3Ah</p>
						</div>
					</div>
				</div>
				<div class="medium-5 columns">
					<div class="callout-card success">
						<div class="card-label">
							<div class="label-text">
								TOP 3
							</div>
						</div>
						<div class="callout-card-content">
							<h3 class="lead"> Avengers: Age of Ultron </h3>
							<img src="/web/naradi/aku-program/makita-uh200dz.jpg" alt="death star"/>
							<p>Akumulátorová okružní pila Makita BSS500RFE 14,4V Li-Ion, 3Ah</p>
						</div>
					</div>
				</div>
			</div>
			{{-- var_dump($view_tree_actual); --}}
		</div>
	</div>
	@include('web.global.footer')
	@include('web.global.scripts')
</div>
</body>
</html>