<?php namespace Authority\Tools\Filter\Csv;

class CsvOptimal extends CsvAbstract
{
	private $data_input = NULL;
	private $data_output = [];
	private $data_bug = [];

	public function __construct($data_input)
	{
		$this->data_input = $data_input;
	}

	public function getDataBug()
	{
		if (count($this->data_bug) > 0) {
			return implode(self::ENDOFLINE, $this->data_bug);
		} else {
			return NULL;
		}
	}

	public function getDataOutput()
	{
		if (count($this->data_output) > 0) {
			return implode(self::ENDOFLINE, $this->data_output);
		} else {
			return NULL;
		}
	}

	public function clearBadCountColumn($column)
	{
		$i = 0;
		foreach (explode(self::ENDOFLINE, $this->data_input) as $val) {
			if (count(explode(self::DELIMITER, $val)) == $column) {
				$this->data_output[$i++] = $val;
			} else {
				$this->data_bug[$i++] = $val;
			}
		}
	}

	public function reduceUnusableCharts()
	{
		$i = 0;
		$reduce = [
			" ;"  => ";",
			"; "  => ";",
			"  "  => " ",
			";;"  => ";",
			"&"   => "a",
			"''"  => "",
			";\r" => "\r",
			" ? " => "",
			"×"   => "x",
			",-"  => "",
			"\""  => "",
			"*"   => "",
			'“'   => "",
			"®"   => "",
			"™"   => "",
			"°"   => "",
			",-"  => "",
			'”'   => "",
			'´'   => ""
		];

		foreach (explode(self::ENDOFLINE, $this->data_input) as $val) {
			$this->data_output[$i++] = strtr($val, $reduce);
		}
	}

	//////////
	//  11  //
	//////////
	public function colDestroy($column)
	{
		$i = 0;
		foreach (explode(self::ENDOFLINE, $this->data_input) as $val) {
			$ex_value = explode(';', $val);
			unset($ex_value[$column - 1]);
			$this->data_output[$i++] = implode(';', $ex_value);
		}
	}
	//////////
	//  12  //
	//////////

	public function colReduceSpace($column)
	{
		$i = 0;
		foreach (explode(self::ENDOFLINE, $this->data_input) as $val) {
			$ex_value = explode(';', $val);
			$ex_value[$column - 1] = trim(strtr($ex_value[$column - 1], [" " => ""]));
			$this->data_output[$i++] = implode(';', $ex_value);
		}
	}
	//////////
	//  13  //
	//////////

	public function colRound($column)
	{
		$i = 0;
		foreach (explode(self::ENDOFLINE, $this->data_input) as $val) {
			$ex_value = explode(';', $val);
			$ex_value[$column - 1] = round($ex_value[$column - 1]);
			$this->data_output[$i++] = implode(';', $ex_value);
		}
	}

	//////////
	//  14  //
	//////////

	public function colTrim($column)
	{
		$i = 0;
		foreach (explode(self::ENDOFLINE, $this->data_input) as $val) {
			$ex_value = explode(';', $val);
			$ex_value[$column - 1] = trim($ex_value[$column - 1]);
			$this->data_output[$i++] = implode(';', $ex_value);
		}
	}

}