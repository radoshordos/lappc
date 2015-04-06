<?php namespace Authority\Tools\Import;

use Authority\Eloquent\Items;
use Authority\Eloquent\SyncDb;
use Authority\Eloquent\SyncDbImg;
use Authority\Eloquent\SyncDbMedia;
use Authority\Eloquent\SyncDbAccessory;

class TotalSyncImport
{
    private $columns;
    private $store_array;
    private $dev_id;
    private $code_prod;
    private $purpose;

    public function  __construct(array $data, array $store_array)
    {
        if (!isset($data['dev_id'])) {
            throw new \RuntimeException("NOT column dev_id");
        }
        if (!isset($data['code_prod'])) {
            throw new \RuntimeException("NOT column code_prod");
        }
        if (!isset($data['purpose'])) {
            throw new \RuntimeException("NOT column purpose");
        }

        $this->columns = $data;
        $this->store_array = $store_array;
        $this->dev_id = $data['dev_id'];
        $this->code_prod = $data['code_prod'];
        $this->purpose = $data['purpose'];
    }

    private function syncDbId()
    {
        return intval(
            SyncDb::select('sync_db.id AS sync_db_id')
                ->where('code_prod', '=', $this->code_prod)
                ->where('dev_id', '=', $this->dev_id)
                ->where('purpose', '=', $this->purpose)
                ->pluck('sync_db_id')
        );
    }

    private function itemsId()
    {
        return intval(
            Items::select('items.id AS items_id')
                ->join('prod', 'items.prod_id', '=', 'prod.id')
                ->where('items.code_prod', '=', $this->code_prod)
                ->where('prod.dev_id', '=', $this->dev_id)
                ->pluck('items_id')
        );
    }

    public function insertData2SyncDb()
    {
        if (isset($this->columns['item_id'])) {
            unset($this->columns['item_id']);
        }
        if (isset($this->columns['updated_at'])) {
            unset($this->columns['updated_at']);
        }

        $items_id = $this->itemsId();
        if ($items_id > 0) {
            $additional = ['item_id' => $items_id, 'updated_at' => date("Y-m-d H:i:s", strtotime('now'))];
        } else {
            $additional = ['updated_at' => date("Y-m-d H:i:s", strtotime('now'))];
        }

        $sync_id = $this->syncDbId();
        if ($sync_id == 0) {
            $sync_db = SyncDb::create(array_merge($this->columns, $additional));
            $this->StoreArray2Db($sync_db);
            return $sync_db;
        } else {
            return SyncDb::where('id', '=', $sync_id)->update(array_merge($this->columns, $additional));
        }
    }

    public function StoreArray2Db($sync_db)
    {
        if ($this->store_array["store_array"]->getCounter() > 0) {
            $sa = $this->store_array["store_array"]->getStoreArray();
            foreach ($sa as $key => $val) {
                switch ($key) {
                    case 'img' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbImg::create(['sync_id' => $sync_db->id, 'url' => $v]);
                        }
                        break;
                    case 'accessory' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbAccessory::create(['sync_id' => $sync_db->id, 'connection' => $v]);
                        }
                        break;
                    case 'doc' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbMedia::create(['sync_id' => $sync_db->id, 'media_variations_id' => 301, 'data' => $v]);
                        }
                        break;
                    case 'pdf' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbMedia::create(['sync_id' => $sync_db->id, 'media_variations_id' => 302, 'data' => $v]);
                        }
                        break;
                    case 'jpg' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbMedia::create(['sync_id' => $sync_db->id, 'media_variations_id' => 303, 'data' => $v]);
                        }
                        break;
                    case 'youtube' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbMedia::create(['sync_id' => $sync_db->id, 'media_variations_id' => 401, 'data' => $v]);
                        }
                        break;
                    case 'parameters' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbMedia::create(['sync_id' => $sync_db->id, 'media_variations_id' => 701, 'data' => $v]);
                        }
                        break;
                    case 'descriptions' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbMedia::create(['sync_id' => $sync_db->id, 'media_variations_id' => 703, 'data' => $v]);
                        }
                        break;
                    case 'packagecontents' :
                        foreach ($sa[$key] as $k => $v) {
                            SyncDbMedia::create(['sync_id' => $sync_db->id, 'media_variations_id' => 704, 'data' => $v]);
                        }
                        break;
                }
            }
        }
    }
}