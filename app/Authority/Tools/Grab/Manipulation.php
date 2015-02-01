<?php namespace Authority\Tools\Grab;

use Authority\Eloquent\ColumnDb;
use Authority\Eloquent\GrabDb;
use Authority\Eloquent\GrabProfile;

class Manipulation
{
	private $script;
	private $profile_id;
	private $charset;
	private $source;
	private $namespace_output = [];

	public function __construct($source, $profile_id)
	{
		$this->script = new ActionMethods();
		$this->profile_id = intval($profile_id);
		$this->charset = GrabProfile::select('charset')->where('id', '=', $profile_id)->pluck('charset');
		$this->source = $this->executeSource($source);
		$this->namespace_output = $this->initNamespaceOutput();

		$this->callManipulation();
	}

	private function executeSource($source)
	{
		if (\URL::isValidUrl(trim($source)) == true) {
			if (strtoupper($this->charset) == "UTF-8") {
				return file_get_contents(trim($source));
			} else {
				return iconv($this->charset, "UTF-8", trim(file_get_contents($source)));
			}
		}
	}

	protected function initNamespaceOutput()
	{
		$arr = [];
		$grabDb = GrabDb::where('profile_id', '=', $this->profile_id)->distinct()->orderBy('id')->get(['column_id']);
		foreach ($grabDb as $row) {
			$arr[$row->columnDb->name] = NULL;
		}
		return $arr;
	}


	protected function callManipulation()
	{
		foreach (array_keys($this->namespace_output) as $key) {

			$counter = 0;
			$line = GrabDb::where('active', '=', 1)
				->where('profile_id', '=', $this->profile_id)
				->where('column_id', '=', ColumnDb::where('name', '=', $key)->pluck('id'))
				->orderBy('position')
				->get();

			$script = new ActionMethods();

			foreach ($line as $row) {
				$i = 0;

				$counter++;

				if ($counter == 1) {
					$source = $this->source;
				} else {
					$source = $this->getNamespace($row->ColumnDb->name);
				}

				$script->setParameters($source, $row->grabFunction->function, $row->val1, $row->val2, $this->namespace_output);

				if (is_array($source)) {
					if ($row->GrabFunction->grabMode->alias == "array" || $row->GrabFunction->grabMode->alias == "arrays2string") {
						$this->set2Namespace($row->ColumnDb->name, $script->applyScript());
					} else {
						foreach ($source as $value) {
							$script->setSource($value);
							$this->set2NamespaceArray($row->ColumnDb->name, $i++, $script->applyScript());
						}
					}
				} else {
					$this->set2Namespace($row->ColumnDb->name, $script->applyScript());
				}
			}
		}
	}

	public function getSource()
	{
		return $this->source;
	}

	private function set2Namespace($namespace, $value)
	{
		$this->namespace_output[$namespace] = $value;
	}

	private function set2NamespaceArray($namespace, $line, $value)
	{
		$this->namespace_output[$namespace][$line] = $value;
	}

	public function getNamespace($namespace = NULL)
	{
		if ($namespace != NULL) {
			return $this->namespace_output[$namespace];
		}
		return $this->namespace_output;
	}
}