<?php namespace Authority\Eloquent;

class SyncTemplateM2nColumn extends \Eloquent
{
	protected $table = 'sync_template_m2n_column';
	protected $guarded = [];
	public $timestamps = FALSE;

	public static $rules = [
		'template_id' => 'required|exists:sync_csv_template,id',
		'column_id'   => 'required|exists:sync_csv_column,id',
	];

	public function template()
	{
		return $this->hasOne('Authority\Eloquent\SyncCsvTemplate', 'id', 'template_id');
	}

	public function column()
	{
		return $this->hasOne('Authority\Eloquent\SyncCsvColumn', 'id', 'column_id');
	}
}