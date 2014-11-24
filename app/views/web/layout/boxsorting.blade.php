<div id="prod-sort"  class="panel clearfix">
    <ul>
        @if (Session::has('tree.sort') && Session::get('tree.sort') == 'cheap')
        <li><a id="cheap" class="active">nejlevnější</a> |</li>
        @else
        <li><a id="cheap">nejlevnější</a> |</li>
        @endif
        @if (Session::has('tree.sort') && Session::get('tree.sort') == 'expensive')
        <li><a id="expensive" class="active">nejdražší</a> |</li>
        @else
        <li><a id="expensive">nejdražší</a> |</li>
        @endif
        @if (Session::has('tree.sort') && Session::get('tree.sort') == 'sell')
        <li><a id="sell" class="active">nejprodávanější</a> |</li>
        @else
        <li><a id="sell">nejprodávanější</a> |</li>
        @endif
        @if (Session::has('tree.sort') && Session::get('tree.sort') == 'fresh')
        <li><a id="fresh" class="active">nejnovější</a></li>
        @else
        <li><a id="fresh">nejnovější</a></li>
        @endif
    </ul>
</div>