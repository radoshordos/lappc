@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Produktové rozdílnosti
@stop

{{-- JavaScript on page --}}
@section ('script')
<link rel="stylesheet" href="{{ asset('admin/components/bootstrap-fileinput/css/fileinput.min.css') }}">
<script src="{{ asset('admin/components/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script>
    $(document).ready(function() {
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
    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Differenční seskupení</a></li>
    <li><a href="#tab2" role="tab" data-toggle="tab">Nastavit seskupení</a></li>
    <li><a href="#tab3" role="tab" data-toggle="tab">Differenční skupiny</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="tab1" style="padding-top: 2em">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-hover table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Délka</th>
                        <th>Skupina</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prod_difference as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->count }}</td>
                        <td>{{ $row->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-md-offset-3">
            {{ Form::open(['route' => ['adm.pattern.proddifference.store','#tab1'],'class' => 'form-horizontal', 'role' => 'form']) }}
            <table class="table table-hover table-bordered table-striped">
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-center">{{ Form::submit('Přidej název nového seskupení', ['name' => 'submit-new-difference','class' => 'btn btn-success']) }}</td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr class="center">
                        <th>#ID</th>
                        <th>Délka</th>
                        <th>Název seskupení</th>
                    </tr>
                    <tr>
                        <td>{{ Form::input('number','id', NULL, array('required' => 'required', 'min' => '1', 'max' => '255', 'class'=> 'form-control', 'placeholder'=> '#ID')) }}</td>
                        <td>{{ Form::selectRange('count', 1, 2, NULL, ['required' => 'required','class'=> 'form-control']); }}</td>
                        <td>{{ Form::text('name', NULL, array('required' => 'required', 'maxlength' => '48', 'class'=> 'form-control', 'placeholder'=> 'Název seskupení')) }}</td>
                    </tr>
                </tbody>
            </table>
            {{ Form::close() }}
        </div>
    </div>
    <div class="tab-pane fade" id="tab2" style="padding-top: 2em">
        {{ Form::open(['route' => ['adm.pattern.proddifference.store','choice_tab2'=> $choice_tab2,'#tab2'], 'method' => 'get','class' => 'form-horizontal', 'role' => 'form']) }}
            <div class="input-group form-group">
                <span class="input-group-addon">Zvolite seskupení</span>
                {{ Form::select('choice_tab2', $select_difference, $choice_tab2, ['class'=> 'form-control', 'onchange' => 'this.form.submit()']) }}
            </div>
        {{ Form::close() }}
        @if (isset($prod_difference_current) && intval($prod_difference_current->count) > intval(count($prod_difference_n2m)))
            <div class="col-md-4 col-md-offset-4">
                {{ Form::open(['route' => ['adm.pattern.proddifference.store','choice_tab2'=> $choice_tab2,'#tab2'], 'class' => 'form-horizontal', 'role' => 'form']) }}
                {{ Form::hidden('choice_tab2',$choice_tab2) }}
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Skupina</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td class="text-center">{{ Form::submit('Přidej název nového seskupení', ['name' => 'submit-new-column-group','class' => 'btn btn-success']) }}</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>{{ Form::select('choice_tab2_set', $select_difference_set, $choice_tab2_set, ['class'=> 'form-control', 'required' => 'required']) }}</td>
                        </tr>
                    </tbody>
                </table>
                {{ Form::close() }}
            </div>
        @endif
        @if (count($prod_difference_n2m)>0)
        <div class="col-md-4 col-md-offset-4">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Využité položky</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td class="text-right">Celkem použito : <strong>{{ intval(count($prod_difference_n2m)) }}</strong> položek</td>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($prod_difference_n2m as $row)
                    <tr>
                        <td>{{Form::text('name', $row->prodDifferenceSet->name, array('readonly' => 'readonly', 'class'=> 'form-control')) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <div class="tab-pane fade" id="tab3" style="padding-top: 2em">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Skupina</th>
                        <th>Řadit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prod_difference_set as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->sortby == 'id' ? 'dle #ID' : 'dle Názvu' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-md-offset-3">
            {{ Form::open(['route' => ['adm.pattern.proddifference.store','#tab3'],'class' => 'form-horizontal', 'role' => 'form']) }}
            <table class="table table-hover table-bordered table-striped">
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-center">{{ Form::submit('Přidej novou skupinu', ['name' => 'submit-new-set','class' => 'btn btn-success']) }}</td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr class="center">
                        <th>#ID</th>
                        <th>Nová skupina</th>
                        <th>Řadit</th>
                    </tr>
                    <tr>
                        <td>{{ Form::input('number','id', NULL, ['required' => 'required', 'min' => '1', 'max' => '255', 'class'=> 'form-control', 'placeholder'=> '#ID']) }}</td>
                        <td>{{ Form::text('name', NULL, ['required' => 'required', 'maxlength' => '32', 'class'=> 'form-control', 'placeholder'=> 'Název skupiny']) }}</td>
                        <td>{{ Form::select('sortby',['id'=>'dle #ID','name'=>'dle Názvu'], NULL, ['required' => 'required', 'class'=> 'form-control']) }}</td>
                    </tr>
                </tbody>
            </table>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop