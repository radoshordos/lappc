@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Hromadné změny prouktů
@stop

{{-- JavaScript on page --}}
@section ('script')
<script>
    $(document).ready(function () {
        $("#select_dev").select2({});
        $("#select_tree").select2({
            allowClear: true
        });
    });
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['action' => 'ProdMultipleChangesController@index', 'method' => 'GET']); }}
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">{{ Form::label('select_dev','Výrobce') }}</th>
            <th class="text-center">{{ Form::label('select_tree','Skupina [Nepovinné]') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-md-4">{{ Form::select('select_dev',$select_dev, $choice_select_dev, ['required' => 'required','class'=> 'form-control']) }}</td>
            <td class="col-md-8">{{ Form::select('select_tree',$select_tree, $choice_select_tree, ['class'=> 'form-control']) }}</td>
        </tr>
    </tbody>
</table>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>SLEVA</th>
                    <th>DOSTUPNOST</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">{{ Form::submit('Hrmodaně změnit',['name' => 'multi-change','class'=> 'btn-primary form-control']) }}</td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Aktuální</td>
                    <td>{{ Form::select('old_select_sale',$select_sale, $choice_old_select_sale, ['required' => 'required','class'=> 'form-control']) }}</td>
                    <td>{{ Form::select('old_select_availability',$select_availability, $choice_old_select_availability, ['required' => 'required','class'=> 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>Nová</td>
                    <td>{{ Form::select('new_select_sale',$select_sale, $choice_new_select_sale, ['required' => 'required','class'=> 'form-control']) }}</td>
                    <td>{{ Form::select('new_select_availability',$select_availability, $choice_new_select_availability, ['required' => 'required','class'=> 'form-control']) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{ Form::close(); }}

@stop



{{--
<form action="" method="get">
    <table>
        <thead>
            <tr>
                <th><label for="prod_id_dev">Výrobce</label></th>
                <th><label for="prod_id_tree">Skupina [Nepovinné]</label></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> $this->formSelect("prod_id_dev", $_GET["prod_id_dev"], array("id" => "prod_id_dev"), $sz->selectDevNoZero()); </td>
                <td> $this->formSelect("prod_id_tree", $_GET["prod_id_tree"], array("id" => "prod_id_tree"), $sz->selectTreeWithProd()); </td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>X</th>
                <th>SLEVA</th>
                <th>DOSTUPNOST</th>
                <th>ONLINE<br />PRODEJ</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4">< $this->formSubmit("change", "OK"); </td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <th>Aktuální:</th>
                <td>< $this->formSelect("old_id_sale", $_GET["old_id_sale"], array("id" => "old_id_sale"), $sz->selectItemsSaleVisibleOnlyWithEmpty()); ?></td>
                <td>< $this->formSelect("old_id_avib", $_GET["old_id_avib"], array("id" => "old_id_avib"), $sz->selectItemsAvailibilityVisibleOnlyWithEmpty()); ?></td>
                <td>< $this->formSelect("old_online", $_GET["old_online"], array("id" => "old_online"), array("" => "", "0" => "NE", "1" => "ANO")); ?></td>
            </tr>
            <tr>
                <th>Nová:</th>
                <td>< $this->formSelect("new_id_sale", $_GET["new_id_sale"], array("id" => "new_id_sale"), $sz->selectItemsSaleVisibleOnlyWithEmpty()); ></td>
                <td>< $this->formSelect("new_id_avib", $_GET["new_id_avib"], array("id" => "new_id_avib"), $sz->selectItemsAvailibilityVisibleOnlyWithEmpty()); ></td>
                <td>< $this->formSelect("new_online", $_GET["new_online"], array("id" => "new_online"), array("" => "", "0" => "NE", "1" => "ANO")); ></td>
            </tr>
        </tbody>
    </table>
</form>

--}}