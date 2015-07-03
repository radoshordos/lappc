<fieldset>
    <legend>Kontaktní­ informace - fakturační­ adresa</legend>
    <div class="row">
        <div class="small-12 large-16 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 large-6 columns">
                    {{ Form::label('c_firstname','Jméno',['class' => 'prefix']) }}
                </div>
                <div class="small-14 large-12 columns">
                    {{ Form::text('c_firstname',$customer['c_firstname'],['id' => 'c_firstname','required' => 'required','maxlength' => 128]) }}
                </div>
            </div>
        </div>
        <div class="small-12 large-16 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 large-6 columns">
                    {{ Form::label('c_lastname','Příjmení',['class' => 'prefix']) }}
                </div>
                <div class="small-14 large-12 columns">
                    {{ Form::text('c_lastname',$customer['c_lastname'],['id' => 'c_lastname','required' => 'required','maxlength' => 128]) }}
                </div>
            </div>
        </div>
        <div class="small-12 large-16 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 large-6 columns">
                    {{ Form::label('c_street','Ulice a číslo popisné',['class' => 'prefix']) }}
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

        <div class="small-12 large-16 large-centered columns" style="margin-top: 0.6em">
            <div class="row collapse prefix-radius">
                <div class="small-4 large-6 columns">
                    {{ Form::label('f_ico','IČO',['class' => 'prefix']) }}
                </div>
                <div class="small-14 large-12 columns">
                    {{ Form::text('f_ico',$customer['f_ico'],['id' => 'f_ico','maxlength' => 8]) }}
                </div>
            </div>
        </div>

        <div class="small-12 large-16 large-centered columns">
            <div class="row collapse prefix-radius">
                <div class="small-4 large-6 columns">
                    {{ Form::label('f_dic','DIČ',['class' => 'prefix']) }}
                </div>
                <div class="small-14 large-12 columns">
                    {{ Form::text('f_dic',$customer['f_dic'],['id' => 'f_dic','maxlength' => 16]) }}
                </div>
            </div>
        </div>
    </div>
</fieldset>

<div id="delivery-blok">
    <div class="row">
        <div class="small-18 large-18">
            <input type="checkbox" name="deliverycheck" id="deliverycheck" value="0"/>Jiná dodací adresa?<br/>
        </div>
    </div>
</div>

<div id="delivery-address" style="display: none">
    <fieldset>
        <legend>Dodací adresa (vyplňte jen v případě, že dodací adresa jiná než fakturační)</legend>
        <div class="row">
            <div class="small-12 large-16 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-4 large-6 columns">
                        {{ Form::label('d_firstname','Jméno',['class' => 'prefix']) }}
                    </div>
                    <div class="small-14 large-12 columns">
                        {{ Form::text('d_firstname',$customer['d_firstname'],['id' => 'd_firstname','maxlength' => 128]) }}
                    </div>
                </div>
            </div>
            <div class="small-12 large-16 large-centered columns">
                <div class="row collapse prefix-radius">
                    <div class="small-4 large-6 columns">
                        {{ Form::label('d_lastname','Příjmení',['class' => 'prefix']) }}
                    </div>
                    <div class="small-14 large-12 columns">
                        {{ Form::text('d_lastname',$customer['d_lastname'],['id' => 'd_lastname','maxlength' => 128]) }}
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
                        {{ Form::text('d_post_code',$customer['d_post_code'],['id' => 'd_post_code','maxlength' => 6]) }}
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