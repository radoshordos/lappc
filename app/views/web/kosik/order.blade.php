<div class="small-11 large-centered columns">
    <fieldset>
        <legend>Kontaktní­ informace - fakturační­ adresa</legend>
        <div class="row">
            <div class="small-6 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-3 columns">
                        {{ Form::label('fullname','Celé jméno',['class' => 'prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::text('fullname',$customer['fullname'],['id' => 'fullname','required' => 'required','maxlength' => 128]) }}
                    </div>
                </div>
            </div>
            <div class="small-6 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-3 columns">
                        {{ Form::label('street','Ulice a čp.',['class' => 'prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::text('street',$customer['street'],['id' => 'street','required' => 'required','maxlength' => 128]) }}
                    </div>
                </div>
            </div>
            <div class="small-6 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-3 columns">
                        {{ Form::label('city','Město',['class' => 'prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::text('city',$customer['city'],['id' => 'city','required' => 'required','maxlength' => 128]) }}
                    </div>
                </div>
            </div>
            <div class="small-6 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-3 columns">
                        {{ Form::label('postcode','PSČ',['class' => 'prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::text('postcode',$customer['postcode'],['id' => 'postcode','required' => 'required','maxlength' => 6]) }}
                    </div>
                </div>
            </div>
            <div class="small-6 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-3 columns">
                        {{ Form::label('phone','Telefon',['class' => 'prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::text('phone',$customer['phone'],['id' => 'phone','required' => 'required','maxlength' => 15]) }}
                    </div>
                </div>
            </div>
            <div class="small-6 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-3 columns">
                        {{ Form::label('email','E-mail',['class' => 'prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::email('email',$customer['email'],['id' => 'email','required' => 'required','maxlength' => 128]) }}
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
