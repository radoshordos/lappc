<script>


</script>


<fieldset>
	<legend>Kontaktní­ informace - fakturační­ adresa</legend>
	<div class="row">
		<div class="small-12 large-16 large-centered columns">
			<div class="row collapse prefix-radius">
				<div class="small-4 large-6 columns">
					{{ Form::label('c_fullname','Celé jméno',['class' => 'prefix']) }}
				</div>
				<div class="small-14 large-12 columns">
					{{ Form::text('c_fullname',$customer['c_fullname'],['id' => 'c_fullname','required' => 'required','maxlength' => 128]) }}
				</div>
			</div>
		</div>
		<div class="small-12 large-16 large-centered columns">
			<div class="row collapse prefix-radius">
				<div class="small-4 large-6 columns">
					{{ Form::label('c_street','Ulice a čp.',['class' => 'prefix']) }}
				</div>
				<div class="small-14 large-12 columns">
					{{ Form::text('c_street',$customer['c_street'],['id' => 'c_street','required' => 'required','maxlength' => 128]) }}
				</div>
			</div>
		</div>
		<div class="small-12 large-16 large-centered columns">
			<div class="row collapse prefix-radius">
				<div class="small-4 large-6 columns">
					{{ Form::label('c_city','Město',['class' => 'prefix']) }}
				</div>
				<div class="small-14 large-12 columns">
					{{ Form::text('c_city',$customer['c_city'],['id' => 'c_city','required' => 'required','maxlength' => 128]) }}
				</div>
			</div>
		</div>
		<div class="small-12 large-16 large-centered columns">
			<div class="row collapse prefix-radius">
				<div class="small-4 large-6 columns">
					{{ Form::label('c_post_code','PSČ',['class' => 'prefix']) }}
				</div>
				<div class="small-14 large-12 columns">
					{{ Form::text('c_post_code',$customer['c_post_code'],['id' => 'c_post_code','required' => 'required','maxlength' => 6]) }}
				</div>
			</div>
		</div>
		<div class="small-12 large-16 large-centered columns">
			<div class="row collapse prefix-radius">
				<div class="small-4 large-6 columns">
					{{ Form::label('c_phone','Telefon',['class' => 'prefix']) }}
				</div>
				<div class="small-14 large-12 columns">
					{{ Form::text('c_phone',$customer['c_phone'],['id' => 'c_phone','required' => 'required','maxlength' => 15]) }}
				</div>
			</div>
		</div>

		<div class="small-12 large-16 large-centered columns">
			<div class="row collapse prefix-radius">
				<div class="small-4 large-6 columns">
					{{ Form::label('c_email','E-mail',['class' => 'prefix']) }}
				</div>
				<div class="small-14 large-12 columns">
					{{ Form::text('c_email',$customer['c_email'],['id' => 'c_email','required' => 'required','maxlength' => 128]) }}
				</div>
			</div>
		</div>
	</div>
</fieldset>

<input type="checkbox" name="deliverycheck" id="deliverycheck" value="0"/>Jiná dodací adresa <br/>


<div id="delivery-address">



	<fieldset>
		<legend>Dodací adresa (vyplňte jen v případě, že dodací adresa jiná než fakturační)</legend>
		<div class="row">
			<div class="small-12 large-16 large-centered columns">
				<div class="row collapse prefix-radius">
					<div class="small-4 large-6 columns">
						{{ Form::label('d_fullname','Celé jméno / název:',['class' => 'prefix']) }}
					</div>
					<div class="small-14 large-12 columns">
						{{ Form::text('d_fullname',$customer['d_fullname'],['id' => 'd_fullname','maxlength' => 128]) }}
					</div>
				</div>
			</div>
			<div class="small-12 large-16 large-centered columns">
				<div class="row collapse prefix-radius">
					<div class="small-4 large-6 columns">
						{{ Form::label('d_street','Ulice a číslo.',['class' => 'prefix']) }}
					</div>
					<div class="small-14 large-12 columns">
						{{ Form::text('d_street',$customer['d_street'],['id' => 'd_street','maxlength' => 128]) }}
					</div>
				</div>
			</div>
			<div class="small-12 large-16 large-centered columns">
				<div class="row collapse prefix-radius">
					<div class="small-4 large-6 columns">
						{{ Form::label('d_city','Město',['class' => 'prefix']) }}
					</div>
					<div class="small-14 large-12 columns">
						{{ Form::text('d_city',$customer['d_city'],['id' => 'd_city','maxlength' => 128]) }}
					</div>
				</div>
			</div>
			<div class="small-12 large-16 large-centered columns">
				<div class="row collapse prefix-radius">
					<div class="small-4 large-6 columns">
						{{ Form::label('d_post_code','PSČ',['class' => 'prefix']) }}
					</div>
					<div class="small-14 large-12 columns">
						{{ Form::text('d_post_code',$customer['d_post_code'],['id' => 'd_post_code','required' => 'required','maxlength' => 6]) }}
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</div>

<fieldset>
	<legend>Vzkaz pro prodejce, váš dotaz, přání atd.</legend>
	<div class="row collapse prefix-radius">
		<div class="small-18 columns">
			{{ Form::textarea('note', $customer['note'], ['id' => 'note','size' => '30x5']) }}
		</div>
	</div>
</fieldset>