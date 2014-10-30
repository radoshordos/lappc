@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Uživatelé hledají
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function (e) {
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('#myTab a[href="#profile"]').tab('show');
        if(location.hash) {
            $('a[href=' + location.hash + ']').tab('show');
        }
        $(document.body).on("click", "a[data-toggle]", function(event) {
            location.hash = this.getAttribute("href");
        });
    });
    $(window).on('popstate', function() {
        var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
        $('a[href=' + anchor + ']').tab('show');
    });
</script>
@stop


{{-- Content --}}
@section('content')
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#last" role="tab" data-toggle="tab">Poslední hledané výrazy</a></li>
  <li><a href="#favorite" role="tab" data-toggle="tab">Nejčasněji hledané výrazy</a></li>
  <li><a href="#zero" role="tab" data-toggle="tab">Nejčasněji nenalezené výrazy</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="last" style="padding-top: 2em">
        <table class="table table-bordered table-striped table-condensed table-hover">
            <thead>
                <tr>
                    <th class="text-center">#ID</th>
                    <th>Datum a čas</th>
                    <th>Hledaný výraz</th>
                    <th>Počet produktů</th>
                    <th>Počet výrobců</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                     <td colspan="5" class="text-right">Zobrazeno : <strong>{{ count($window1) }}</strong> výsledků</td>
                </tr>
            </tfoot>
            <tbody>
            @foreach ($window1 as $row)
                <tr>
                    <td>{{ $row->id; }}</td>
                    <td>{{ $row->find_at; }}</td>
                    <td>{{ $row->filter_find; }}</td>
                    <td>{{ $row->count_prod; }}</td>
                    <td>{{ $row->count_dev; }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="favorite" style="padding-top: 2em">
        <table class="table table-bordered table-striped table-condensed table-hover">
        <thead>
            <tr class="center">
                <th>Hledaný výraz</th>
                <th>Počet</th>
                <th>&sum; Produktů</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right">Zobrazeno : <strong>{{ count($window2) }}</strong> výsledků</td>
            </tr>
        </tfoot>
        <tbody>
        @foreach ($window2 as $row)
            <tr>
                <td>{{ $row->filter_find }}</td>
                <td>{{ $row->pocet  }}</td>
                <td>{{ $row->count_prod  }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="tab-pane fade" id="zero" style="padding-top: 2em">
        <table class="table table-bordered table-striped table-condensed table-hover">
            <thead>
                <tr class="center">
                <th>Hledaný výraz</th>
                    <th>Počet</th>

                    <th>&sum; Produktů</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right">Zobrazeno : <strong>{{ count($window3) }}</strong> výsledků</td>
                </tr>
            </tfoot>
            <tbody>
            @foreach ($window3 as $row)
                <tr>
                    <td>{{ $row->filter_find }}</td>
                    <td>{{ $row->pocet  }}</td>
                    <td>{{ $row->count_prod  }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop