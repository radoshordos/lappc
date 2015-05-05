<?php namespace Authority\Runner\Task\Events;

use Authority\Eloquent\Forex;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class CnbUpdateForex extends TaskMessage implements iRun
{

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function run()
    {
        $str = str_replace(',', '.', file_get_contents("http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.txt"));
        if (strlen($str) > 200) {

            $forex = explode("\n", $str);
            $date = explode(" ", $forex[0]);
            $emu = explode("|", $forex[7]);

            if ($emu[0] == "EMU") {
                if ($emu[4] > 17 && $emu[4] < 35) {

                    $forex = Forex::find(2);
                    $forex->cnb_date = $date[0];
                    $forex->exchange_rate = doubleval($emu[4]);
                    $forex->save();
                }
            }
        }
        $this->addMessage("Nová cena k " . $date[0] . " : <b>" . $forex->exchange_rate . "</b> Kč");
    }
}