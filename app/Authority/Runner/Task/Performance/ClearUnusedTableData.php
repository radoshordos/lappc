<?php namespace Authority\Runner\Task\Performance;

use Authority\Eloquent\Dev;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\AkceAvailability;
use Authority\Eloquent\AkceMinitext;
use Authority\Eloquent\ProdWarranty;
use Authority\Eloquent\ProdDifference;
use Authority\Eloquent\SyncCsvTemplate;

class ClearUnusedTableData extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $this->clearAkceAvailability();
        $this->clearAkceMinitext();
        $this->clearProdDifference();
        $this->clearProdWarranty();
        $this->clearSyncCsvTemplate();
        $this->clearInfoDev();
    }

    public function clearAkceAvailability()
    {
        $count = 0;
        $row = \DB::table('akce_availability AS aa')
            ->select(['aa.id',
                \DB::raw('COUNT(at.availability_id) AS availability_count')
            ])
            ->leftJoin('akce_template AS at', 'at.availability_id', '=', 'aa.id')
            ->where('aa.origin', '=', '0')
            ->groupBy('aa.id')
            ->having('availability_count', '=', '0')
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += AkceAvailability::destroy($val->id);
            }
        }
        $this->addMessage("Odstraněno nevyužitých platností akce : <b>" . $count . "</b>");
    }

    public function clearAkceMinitext()
    {
        $count = 0;
        $row = \DB::table('akce_minitext as am')
            ->select(['am.id',
                \DB::raw('COUNT(at.minitext_id) as minitext_count')
            ])
            ->leftJoin('akce_template as at', 'at.minitext_id', '=', 'am.id')
            ->where('am.origin', '=', 0)
            ->groupBy('am.id')
            ->having('minitext_count', '=', '0')
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += AkceMinitext::destroy($val->id);
            }
        }

        $this->addMessage("Odstraněno nevyužitých akčních minitextů : <b>" . $count . "</b>");
    }

    public function clearProdDifference()
    {
        $count = 0;
        $row = \DB::table('prod_difference AS pd')
            ->select(['pd.id',
                \DB::raw('COUNT(prod.difference_id) as difference_count')
            ])
            ->leftJoin('prod', 'prod.difference_id', '=', 'pd.id')
            ->groupBy('pd.id')
            ->having('difference_count', '=', '0')
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += ProdDifference::destroy($val->id);
            }
        }
        $this->addMessage("Odstraněno nevyužitých typů variačních skupin : <b>" . $count . "</b>");
    }

    public function clearInfoDev()
    {
        $row = Dev::distinct()->select(['dev.id AS dev_id', 'dev.name'])
            ->leftJoin('prod', 'dev.id', '=', 'prod.dev_id')
            ->where('dev.id','>','1')
            ->whereNull('prod.id')
            ->orderBy('name')
            ->get();

        $arr = [];
        foreach ($row as $val) {
            $arr[] = $val->name;
        }

        $this->addMessage("Mohou být odstraněni tito výrobci : <b>" . implode(", ", $arr) . "</b>");
    }

    public function clearProdWarranty()
    {
        $count = 0;
        $row = \DB::table('prod_warranty')
            ->select(['prod_warranty.id',
                \DB::raw('COUNT(prod.warranty_id) as warranty_count')
            ])
            ->leftJoin('prod', 'prod.warranty_id', '=', 'prod_warranty.id')
            ->groupBy('prod_warranty.id')
            ->having('warranty_count', '=', '0')
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += ProdWarranty::destroy($val->id);
            }
        }
        $this->addMessage("Odstraněno nevyužitých záruk : <b>" . $count . "</b>");
    }

    public function clearSyncCsvTemplate()
    {
        $count = 0;
        $row = SyncCsvTemplate::where('trigger_column_count', '=', '0')->get();
        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += SyncCsvTemplate::destroy($val->id);
            }
        }
        $this->addMessage("Odstraněno nevyužitých CSV šablon : <b>" . $count . "</b>");
    }
}