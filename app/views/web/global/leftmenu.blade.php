<?php $group_id = 0; ?>
<div id="menu-action" class="icon-bar vertical">
    <a class="item">
        <label>Akční nářadí</label>
    </a>
    <a class="item">
        <label>Výprodej nářadí</label>
    </a>
    <a class="item">
        <label>Novinky v e-shopu</label>
    </a>
</div>
<br />
@foreach($view_tree_array as $vta)
    @if ($group_id != $vta->tree_group_id)
        <?php $group_id = $vta->tree_group_id; ?>
        <div class="icon-bar vertical">
            <a class="item">
                <label>{{ $vta->tree_group_name }}</label>
            </a>
        </div>
    @endif
    @if ($vta->tree_deep == 1)
        <p><a href="{{ '/'.$vta->tree_absolute }}">{{ $vta->tree_name }}</a></p>
    @endif
@endforeach


<p><a href="http://localhost:8000/adm/">ADM</a></p>
<p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
