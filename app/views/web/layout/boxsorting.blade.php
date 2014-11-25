<div id="prod-sort" class="panel clearfix">
    <ul>
        @if (Session::has('tree.sort') && Session::get('tree.sort') == 'expensive')
            <li><a id="cheap">nejlevnější</a> |</li>
            <li><a id="expensive" class="active">nejdražší</a> |</li>
            <li><a id="sell">nejprodávanější</a> |</li>
            <li><a id="fresh">nejnovější</a></li>
        @elseif (Session::has('tree.sort') && Session::get('tree.sort') == 'sell')
            <li><a id="cheap">nejlevnější</a> |</li>
            <li><a id="expensive">nejdražší</a> |</li>
            <li><a id="sell" class="active">nejprodávanější</a> |</li>
            <li><a id="fresh">nejnovější</a></li>
        @elseif (Session::has('tree.sort') && Session::get('tree.sort') == 'fresh')
            <li><a id="cheap">nejlevnější</a> |</li>
            <li><a id="expensive">nejdražší</a> |</li>
            <li><a id="sell">nejprodávanější</a> |</li>
            <li><a id="fresh" class="active">nejnovější</a></li>
        @else
            <li><a id="cheap" class="active">nejlevnější</a> |</li>
            <li><a id="expensive">nejdražší</a> |</li>
            <li><a id="sell">nejprodávanější</a> |</li>
            <li><a id="fresh">nejnovější</a></li>
        @endif
    </ul>
</div>