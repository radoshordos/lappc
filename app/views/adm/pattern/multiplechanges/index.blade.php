@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Hromadné změny prouktů
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('url' => '', 'method' => 'GET')); }}
    <table>
        <thead>
            <tr>
                <th><label for="prod_id_dev">Výrobce</label></th>
                <th><label for="prod_id_tree">Skupina [Nepovinné]</label></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->formSelect("prod_id_dev", $_GET["prod_id_dev"], array("id" => "prod_id_dev"), $sz->selectDevNoZero()); ?></td>
                <td><?= $this->formSelect("prod_id_tree", $_GET["prod_id_tree"], array("id" => "prod_id_tree"), $sz->selectTreeWithProd()); ?></td>
            </tr>
        </tbody>
    </table>
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
                <td><?= $this->formSelect("prod_id_dev", $_GET["prod_id_dev"], array("id" => "prod_id_dev"), $sz->selectDevNoZero()); ?></td>
                <td><?= $this->formSelect("prod_id_tree", $_GET["prod_id_tree"], array("id" => "prod_id_tree"), $sz->selectTreeWithProd()); ?></td>
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
                <td colspan="4"><?= $this->formSubmit("change", "OK"); ?></td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <th>Aktuální:</th>
                <td><?= $this->formSelect("old_id_sale", $_GET["old_id_sale"], array("id" => "old_id_sale"), $sz->selectItemsSaleVisibleOnlyWithEmpty()); ?></td>
                <td><?= $this->formSelect("old_id_avib", $_GET["old_id_avib"], array("id" => "old_id_avib"), $sz->selectItemsAvailibilityVisibleOnlyWithEmpty()); ?></td>
                <td><?= $this->formSelect("old_online", $_GET["old_online"], array("id" => "old_online"), array("" => "", "0" => "NE", "1" => "ANO")); ?></td>
            </tr>
            <tr>
                <th>Nová:</th>
                <td><?= $this->formSelect("new_id_sale", $_GET["new_id_sale"], array("id" => "new_id_sale"), $sz->selectItemsSaleVisibleOnlyWithEmpty()); ?></td>
                <td><?= $this->formSelect("new_id_avib", $_GET["new_id_avib"], array("id" => "new_id_avib"), $sz->selectItemsAvailibilityVisibleOnlyWithEmpty()); ?></td>
                <td><?= $this->formSelect("new_online", $_GET["new_online"], array("id" => "new_online"), array("" => "", "0" => "NE", "1" => "ANO")); ?></td>
            </tr>
        </tbody>
    </table>
</form>

--}}