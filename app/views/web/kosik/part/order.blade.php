<div class="small-11 large-centered columns">
    <form>
        <fieldset>
            <legend>Kontaktní­ informace - fakturační­ adresa</legend>
            <div class="row">
                <div class="small-6 large-centered columns">
                    <div class="row collapse prefix-radius">
                        <div class="small-3 columns">
                            {{ Form::label('fullname','Celé jméno',['class' => 'prefix']) }}
                        </div>
                        <div class="small-9 columns">
                            {{ Form::text('fullname',NULL,['id' => 'fullname','maxlength' => 128]) }}
                        </div>
                    </div>
                </div>
                <div class="small-6 large-centered columns">
                    <div class="row collapse prefix-radius">
                        <div class="small-3 columns">
                            {{ Form::label('street','Ulice',['class' => 'prefix']) }}
                        </div>
                        <div class="small-9 columns">
                            {{ Form::text('street',NULL,['id' => 'street','maxlength' => 128]) }}
                        </div>
                    </div>
                </div>
                <div class="small-6 large-centered columns">
                    <div class="row collapse prefix-radius">
                        <div class="small-3 columns">
                            {{ Form::label('city','Město',['class' => 'prefix']) }}
                        </div>
                        <div class="small-9 columns">
                            {{ Form::text('city',NULL,['id' => 'city','maxlength' => 128]) }}
                        </div>
                    </div>
                </div>
                <div class="small-6 large-centered columns">
                    <div class="row collapse prefix-radius">
                        <div class="small-3 columns">
                            {{ Form::label('postcode','PSČ',['class' => 'prefix']) }}
                        </div>
                        <div class="small-9 columns">
                            {{ Form::text('postcode',NULL,['id' => 'postcode','maxlength' => 6]) }}
                        </div>
                    </div>
                </div>
                <div class="small-6 large-centered columns">
                    <div class="row collapse prefix-radius">
                        <div class="small-3 columns">
                            {{ Form::label('phone','Telefon',['class' => 'prefix']) }}
                        </div>
                        <div class="small-9 columns">
                            {{ Form::text('phone',NULL,['id' => 'phone','maxlength' => 15]) }}
                        </div>
                    </div>
                </div>
                <div class="small-6 large-centered columns">
                    <div class="row collapse prefix-radius">
                        <div class="small-3 columns">
                            {{ Form::label('email','E-mail',['class' => 'prefix']) }}
                        </div>
                        <div class="small-9 columns">
                            {{ Form::email('email',NULL,['id' => 'email','maxlength' => 128]) }}
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>