<?php
$date = new \DateTime();
$date->add(DateInterval::createFromDateString('tomorrow'));
?>
<table id="transport">
    <tbody>
    <tr>
        <td>k Vám dorazí</td>
        <td>doručení</td>
        <td>prodejna</td>
        <td>dodání na obchod</td>
        <td>centralní sklad</td>
    </tr>
    <tr>
        <td><i class="fa fa-home fa-3x"></i></td>
        <td><i class="fa fa-long-arrow-left fa-3x"></i></td>
        <td style="color: lightgreen"><i class="fa fa-wrench fa-3x"></i></td>
        <td><i class="fa fa-long-arrow-left fa-3x"></i></td>
        <td style="color: red"><i class="fa fa-truck fa-3x"></i></td>
    </tr>
    <tr>
        <td class="date-exp"><span data-tooltip aria-haspopup="true" class="has-tip radius"
                                   title="Zboží expedujeme kolem 14h"><span>{{ $date->format('j.m.Y'); }}</span></span>
        </td>
        <td>1 den</td>
        <td>skladem<br/>{{ $vpa->getProdStoreroom() + 4 }} ks</td>
        <td>3 dny</td>
        <td>není<br/>skladem</td>
    </tr>
    </tbody>
</table>