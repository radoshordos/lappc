<?php namespace Authority\Tools\Import;

use Authority\Eloquent\Items;
use Authority\Eloquent\SyncDb;

class TotalSyncImport
{
    private $columns;
    private $dev_id;
    private $code_prod;
    private $purpose;

    public function  __construct(array $data)
    {
        if (!isset($data['dev_id'])) {
            throw new \RuntimeException("NOT column dev_id");
        }
        if (!isset($data['code_prod'])) {
            throw new \RuntimeException("NOT column code_prod");
        }
        if (!isset($data['dev_id'])) {
            throw new \RuntimeException("NOT column purpose");
        }

        $this->columns = $data;
        $this->dev_id = $data['dev_id'];
        $this->code_prod = $data['code_prod'];
        $this->purpose = $data['purpose'];
    }

    private function syncDbId()
    {
        return intval(
            SyncDb::where('code_prod', '=', $this->code_prod)
                ->where('dev_id', '=', $this->dev_id)
                ->where('purpose', '=', $this->purpose)
                ->pluck('id')
        );
    }

    private function itemsId()
    {
        return intval(
            Items::join('prod', 'items.prod_id', '=', 'prod.id')
                ->where('items.code_prod', '=', $this->code_prod)
                ->where('prod.dev_id', '=', $this->dev_id)->pluck('items.id')
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

        $additional = ['updated_at' => date("Y-m-d H:i:s", strtotime('now'))];

        $items_id = $this->itemsId();
        if ($items_id > 0) {
            $additional = array_merge($additional, ['item_id' => $items_id]);
        }

        $sync_id = $this->syncDbId();
        if ($sync_id == 0) {
            return SyncDb::create(array_merge($this->columns, $additional));
        } else {
            return SyncDb::where('id', '=', $sync_id)->update(array_merge($this->columns, $additional));
        }
    }

}