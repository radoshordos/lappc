<div class="panel callout radius" id="order-note">
    <div class="row">
        <label>Vzkaz pro prodejce, váš dotaz, přání atd.
            {{ Form::textarea('note', $customer['note'], ['id' => 'note','size' => '30x5']) }}
        </label>
    </div>
</div>