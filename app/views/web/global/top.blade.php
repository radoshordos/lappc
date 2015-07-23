<header class="row">
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name">
				<h1><a href="#">Guru nářadí</a></h1>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
				<li class="has-dropdown">
					<a href="#">Obchod</a>
					<ul class="dropdown">
						<li><a href="#">Nářadí Doležalová s.r.o.</a></li>
                        <li><a href="/kontakt">Kontakt</a></li>
                        <li><a href="/nakup-na-splatky-home-credit">Splátky Home Credit</a></li>

					</ul>
				</li>
				<li>
					<a href="#">Přihlásit se</a>
				</li>
				<li style="padding: .1em .5em">
					<a href="/nakupni-kosik" class="button success large"><i class="fa fa-shopping-cart fa-lg"></i> Košík</a>
				</li>
			</ul>
			<ul class="left">
				<li>
					{{ Form::open(['url' => '/vyhledat-naradi', 'method' => 'GET', 'files' => TRUE]); }}

					<div class="row collapse">
						<div class="large-12 small-12 columns ui-widget">

							{{--
							<fieldset role="search">
								<input class="ac_source ac_desktop ui-autocomplete-input" autocapitalize="off" autocorrect="off" type="text" data-position="top-left" data-lang="cs" name="search" value="Zadejte hledanou frázi" onfocus="if(this.value=='Zadejte hledanou frázi'){this.value=''}" onblur="if(this.value.replace(/ /g, '') == ''){this.value='Zadejte hledanou frázi'}" required="" autocomplete="off" aria-required="true">
								<div><button type="submit"><span class="icon-search"></span></button></div>
							</fieldset>
								--}}

							{{ Form::input('search','term', $term,['size' => '40', 'id' => 'term', "placeholder" => "Nalést nářadí i příslušenství"]) }}
						</div>
					</div>
					{{ Form::close() }}
				</li>
			</ul>
		</section>
	</nav>
	@include('web.global.blocknav')
</header>