<?php $group_id = 0; ?>

@foreach($view_tree as $row)
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

{{--
@if ($paginator->getLastPage() > 1)
    <ul class="ui pagination menu">
    @if ($paginator->getCurrentPage() > 1)
    <li></li>
    @else
    <li></li>
    @endif
    @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
    @if ($paginator->getCurrentPage() == $i )
    <li class="active">{{ $i }}</li>
    @else
    <li>{{ $i }}</li>
    @endif
    @endfor
    @if ($paginator->getCurrentPage() < $paginator->getLastPage())
    <li></li>
    @else
    <li></li>
    @endif
    </ul>
@endif
--}}