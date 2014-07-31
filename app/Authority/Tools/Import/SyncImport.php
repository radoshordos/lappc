<?php namespace Authority\Tools\Import;

use Authority\Eloquent\SyncCsvTemplate;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Eloquent\SyncDb;

class SyncImport
{
    private $columns;
    private $templateId;
    private $data;
    private $item;
    private $separator;

    public function __construct($templateId, $separator, $data)
    {
        $this->data = $data;
        $this->separator = $separator;
        $this->templateId = $templateId;
        $this->columns = $this->getColumnsName($templateId);
        $this->item = $this->dataToArray();

        var_dump($this->item);


        $this->InsertToDb();


    }

    public function getColumnsName($templateId)
    {
        return \DB::table('sync_template_m2n_colmun')
            ->leftJoin('sync_csv_column', 'sync_template_m2n_colmun.column_id', '=', 'sync_csv_column.id')
            ->where('sync_template_m2n_colmun.template_id', '=', $templateId)
            ->orderBy('sync_template_m2n_colmun.id')
            ->get(array('sync_csv_column.element'));
    }

    public function getUniqueDevId()
    {
        $template = SyncCsvTemplate::where('id', '=', $this->templateId)->first();
        if (intval($template->mixtureDev->trigger_column_count) == 1) {
            $mdi = MixtureDevM2nDev::where('mixture_dev_id', '=', $template->mixtureDev->id)->first();
            return $mdi->dev_id;
        }
        return 0;
    }

    public function dataToArray()
    {
        $arr = array();
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

        $timestamp = strtotime('now');
        $date = new \DateTime;

        foreach ($this->item as $val) {
            $val['created_at'] = $date;
            $val['updated_at'] = $date;
            $res = SyncDb::insert($val);
        }

        if ($res) {
            \Session::flash('success', 'Import proběhl úspěšně');
        }
    }

}