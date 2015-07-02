<fieldset>
    <legend>Kontaktní­ informace - fakturační­ adresa</legend>
    <div class="row">
        <div class="small-12 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                    {{ Form::label('c_firstname','Jméno',['class' => 'prefix']) }}
                </div>
                <div class="small-14 columns">
                    {{ Form::text('c_firstname',$customer['c_firstname'],['id' => 'c_firstname', 'readonly'=>'readonly', 'required' => 'required','maxlength' => 128]) }}
                </div>
            </div>
        </div>
        <div class="small-12 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                    {{ Form::label('c_lastname','Příjmení',['class' => 'prefix']) }}
                </div>
                <div class="small-14 columns">
                    {{ Form::text('c_lastname',$customer['c_lastname'],['id' => 'c_lastname', 'readonly'=>'readonly', 'required' => 'required','maxlength' => 128]) }}
                </div>
            </div>
        </div>

        <div class="small-12 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                    {{ Form::label('c_street','Ulice a čp.',['class' => 'prefix']) }}
                </div>
                <div class="small-14 columns">
                    {{ Form::text('c_street',$customer['c_street'],['id' => 'c_street','readonly'=>'readonly','required' => 'required','maxlength' => 128]) }}
                </div>
            </div>
        </div>
        <div class="small-12 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                    {{ Form::label('c_city','Město',['class' => 'prefix']) }}
                </div>
                <div class="small-14 columns">
                    {{ Form::text('c_city',$customer['c_city'],['id' => 'c_city','readonly'=>'readonly','required' => 'required','maxlength' => 128]) }}
                </div>
            </div>
        </div>
        <div class="small-12 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                    {{ Form::label('c_post_code','PSČ',['class' => 'prefix']) }}
                </div>
                <div class="small-14 columns">
                    {{ Form::text('c_post_code',$customer['c_post_code'],['id' => 'c_post_code','readonly'=>'readonly','required' => 'required','maxlength' => 6]) }}
                </div>
            </div>
        </div>
        <div class="small-12 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                    {{ Form::label('c_phone','Telefon',['class' => 'prefix']) }}
                </div>
                <div class="small-14 columns">
                    {{ Form::text('c_phone',$customer['c_phone'],['id' => 'c_phone','readonly'=>'readonly','required' => 'required','maxlength' => 15]) }}
                </div>
            </div>
        </div>
        <div class="small-12 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 columns">
                    {{ Form::label('c_email','E-mail',['class' => 'prefix']) }}
                </div>
                <div class="small-14 columns">
                    {{ Form::email('c_email',$customer['c_email'],['id' => 'c_email','readonly'=>'readonly','required' => 'required','maxlength' => 128]) }}
                </div>
            </div>
        </div>
    </div>
</fieldset>