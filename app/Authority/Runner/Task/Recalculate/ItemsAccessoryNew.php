<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\ItemsAccessory;
use Authority\Eloquent\SyncDbAccessory;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class ItemsAccessoryNew extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function run()
    {
        $count = 0;
        $sda = SyncDbAccessory::select(['sync_db.item_id', 'sync_db.dev_id', 'sync_db_accessory.connection', 'items.id'])
            ->join('sync_db', 'sync_db_accessory.sync_id', '=', 'sync_db.id')
            ->join('items', 'sync_db_accessory.connection', '=', 'items.code_prod')
            ->whereNotNull('item_id')
            ->get();

        if (!empty($sda)) {
            foreach ($sda as $val) {
                $count = ItemsAccessory::where('item_from_id', '=', $val->item_id)->where('item_to_id', '=', $val->id)->count();
                if ($count === 0) {
                    ItemsAccessory::create(['purpose' => 'cronacc', 'item_from_id' => $val->item_id, 'item_to_id' => $val->id]);
                    $count++;
                }
            }
        }
        $this->addMessage("Přidáno doporučeného příslušenství k produktu: <b>" . $count . "</b>");
    }
}