<div class="panel callout radius" id="order-firm">
    <div class="row">
        <input type="checkbox" name="order-firm-check" id="order-firm-check" value="0"/>
        <label for="order-firm-check">Firemní údaje</label>
    </div>

    <div id="order-firm-inputs" style="display: none">
        <div class="row">
            <div class="large-18 columns">
                <label>Firma
                    {{ Form::text('f_company',$customer['f_company'],['id' => 'f_company','maxlength' => 128]) }}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-18 columns">
                <label>IČO
                    {{ Form::text('f_ico',$customer['f_ico'],['id' => 'f_ico','maxlength' => 8]) }}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-18 columns">
                <label>DIČ
                    {{ Form::text('f_dic',$customer['f_dic'],['id' => 'f_dic','maxlength' => 16]) }}
                </label>
            </div>
        </div>
    </div>
</div>