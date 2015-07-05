<div class="panel callout radius" id="order-address">

    <div class="row">
        <div class="large-18 columns">
            <label>Jméno
                {{ Form::text('c_firstname',$customer['c_firstname'],['id' => 'c_firstname','required' => 'required','maxlength' => 128]) }}
            </label>
        </div>
    </div>

    <div class="row">
        <div class="large-18 columns">
            <label>Příjmení
                {{ Form::text('c_lastname',$customer['c_lastname'],['id' => 'c_lastname','required' => 'required','maxlength' => 128]) }}
            </label>
        </div>
    </div>

    <div class="row">
        <div class="large-18 columns">
            <label>Ulice a číslo popisné
                {{ Form::text('c_street',$customer['c_street'],['id' => 'c_street','required' => 'required','maxlength' => 128]) }}
            </label>
        </div>
    </div>

    <div class="row">
        <div class="large-18 columns">
            <label>Město
                {{ Form::text('c_city',$customer['c_city'],['id' => 'c_city','required' => 'required','maxlength' => 128]) }}
            </label>
        </div>
    </div>

    <div class="row">
        <div class="small-6 columns">
            <label>PSČ
                {{ Form::text('c_post_code',$customer['c_post_code'],['id' => 'c_post_code','required' => 'required','maxlength' => 6]) }}
            </label>
        </div>
    </div>

    <div class="row">
        <div class="small-6 columns">
            <label>Telefon
                {{ Form::text('c_phone',$customer['c_phone'],['id' => 'c_phone','required' => 'required','maxlength' => 15]) }}
            </label>
        </div>
    </div>

    <div class="row">
        <div class="large-18 columns">
            <label>E-mail
                {{ Form::email('c_email',$customer['c_email'],['id' => 'c_email','required' => 'required','maxlength' => 128]) }}
            </label>
        </div>
    </div>
</div>