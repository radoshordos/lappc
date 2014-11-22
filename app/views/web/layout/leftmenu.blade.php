<?php $group_id = 0; ?>

@foreach($vt_list as $row)
    @if ($group_id != $row->tree_group_id)
    <?php $group_id = $row->tree_group_id; ?>
    <div class="icon-bar vertical">
        <a class="item">
            <label>{{ $row->tree_group_name }}</label>
        </a>
    </div>
    @endif
    @if ($row->tree_deep == 1)
        <li><a href="{{ '/'.$row->tree_absolute }}">{{ $row->tree_name }}</a></li>
    @endif
@endforeach
</div>