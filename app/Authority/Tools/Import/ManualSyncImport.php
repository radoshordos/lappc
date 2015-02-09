<?php namespace Authority\Tools\Import;

use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Eloquent\RecordSyncImport;
use Authority\Eloquent\SyncCsvTemplate;
use Authority\Eloquent\SyncRecord;
use Authority\Tools\Filter\Csv\CheckerColumn;

class ManualSyncImport
{
    private $columns;
    private $template_id;
    private $import_type;
    private $data;
    private $item;
    private $separator;

    public function __construct($template_id, $separator, $import_type, $data)
    {
        $this->data = $data;
        $this->separator = $separator;
        $this->import_type = $import_type;
        $this->template_id = $template_id;
        $this->columns = $this->getColumnsName($template_id);
        $this->item = $this->dataToArray();
        $this->InsertToDb();
    }

    public function getColumnsName($template_id)
    {
        return \DB::table('sync_template_m2n_colmun')
            ->leftJoin('sync_csv_column', 'sync_template_m2n_colmun.column_id', '=', 'sync_csv_column.id')
            ->where('sync_template_m2n_colmun.template_id', '=', $template_id)
            ->orderBy('sync_template_m2n_colmun.id')
            ->get(['sync_csv_column.element']);
    }

    public function getUniqueDevId()
    {
        $template = SyncCsvTemplate::where('id', '=', $this->template_id)->first();
        if (intval($template->mixtureDev->trigger_column_count) == 1) {
            $mdi = MixtureDevM2nDev::where('mixture_dev_id', '=', $template->mixtureDev->id)->first();
            return $mdi->dev_id;
        }
        return 0;
    }

    public function dataToArray()
    {
        $arr = [];
        $y = 0;

        $dev_id = $this->getUniqueDevId();

        foreach (explode("\r\n", $this->data) as $line) {
            $i = 0;
            foreach (explode($this->separator, $line) as $row) {
                $arr[$y][$this->columns[$i++]->element] = $row;
            }

            if ($dev_id > 0) {
                $arr[$y]['dev_id'] = $dev_id;
            }

            $y++;
        }
        return $arr;
    }

    public function InsertToDb()
    {
        $i = 0;
        $item_counter_insert = $item_counter_all = 0;
        $arr = [];

        foreach ($this->item as $val) {
            $cc = new CheckerColumn($val, ++$i);
            $arr[] = $cc->getItem();
        }

        $record_id = strtotime('now');
        $date = new \DateTime;

        \DB::beginTransaction();

        $rsi = RecordSyncImport::create([
            'id'           => $record_id,
            'template_id'  => ($this->template_id ? $this->template_id : NULL),
            'purpose'      => $this->import_type,
            'name'         => __CLASS__,
            'created_at'   => $date
        ]);

        foreach ($arr as $val) {

            $val = array_map('trim', $val);
            $val['record_id'] = $record_id;
            $val['purpose'] = $this->import_type;
            $val['created_at'] = $date;

            $tsi = new TotalSyncImport(array_filter($val));
            $res = $tsi->insertData2SyncDb();
            $item_counter_all++;
            if (!empty($res)) {
                $item_counter_insert++;
            }
        }

        $db = RecordSyncImport::find($record_id);
        $db->item_counter_all = $item_counter_all;
        $db->item_counter_insert = $item_counter_insert;
        $db->save();

        \Session::flash('success', 'Import proběhl úspěšně');
        \DB::commit();
    }

}