<div class="panel callout radius" id="order-delivery">
    <div class="row">
        <input type="checkbox" name="order-delivery-check" id="order-delivery-check" value="0"/>
        <label for="order-delivery-check">Jiná dodací adresa</label>
    </div>
    <div id="order-delivery-inputs" class="hide">
        <div class="row">
            <div class="large-18 columns">
                <label>Jméno
                    {{ Form::text('d_firstname',$customer['d_firstname'],['id' => 'd_firstname','maxlength' => 128]) }}
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-18 columns">
                <label>Příjmení
                    {{ Form::text('d_lastname',$customer['d_lastname'],['id' => 'd_lastname','maxlength' => 128]) }}
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-18 columns">
                <label>Ulice a číslo popisné
                    {{ Form::text('d_street',$customer['d_street'],['id' => 'd_street','maxlength' => 128]) }}
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-18 columns">
                <label>Město
                    {{ Form::text('d_city',$customer['d_city'],['id' => 'd_city','maxlength' => 128]) }}
                </label>
            </div>
        </div>

        <div class="row">
            <div class="small-6 columns">
                <label>PSČ
                    {{ Form::text('d_post_code',$customer['d_post_code'],['id' => 'd_post_code','maxlength' => 6]) }}
                </label>
            </div>
        </div>
    </div>
</div>