<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">O produktu</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-3">Vytvořeno</div>
            <div class="col-xs-9">{{ $prod->created_at }}</div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-3">Poslední úprava</div>
            <div class="col-xs-9">{{ $prod->updated_at }}</div>
        </div>
    </div>
</div>
@if (isset($prod->akce->akce_prod_id))
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">O aktuální akci</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">Vytvořeno</div>
                <div class="col-md-9">{{ $prod->akce->created_at }}</div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">Poslední úprava</div>
                <div class="col-md-9">{{ $prod->akce->updated_at }}</div>
            </div>
        </div>
    </div>
@endif
