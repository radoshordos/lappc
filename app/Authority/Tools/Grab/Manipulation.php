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
        $this->script = new Script();
        $this->profile_id = intval($profile_id);
        $this->charset = GrabProfile::where('id', '=', $profile_id)->pluck('charset');
        $this->source = htmlentities($this->executeSource($source));
        $this->namespace_output = $this->initNamespaceOutput();

        $this->callManipulation();
    }

    private function executeSource($source)
    {
        if (\URL::isValidUrl(trim($source)) == true) {
            if (strtoupper($this->charset) == "UTF-8") {

                return file_get_contents(trim($source));
            } else {
                return iconv($this->charset, "UTF-8", trim($source));
            }
        }
    }

    protected function initNamespaceOutput()
    {
        $arr = [];
        $grabDb = GrabDb::where('profile_id', '=', $this->profile_id)->distinct()->get(['column_id']);
        foreach ($grabDb as $row) {
            $arr[$row->columnDb->name] = NULL;
        }
        return $arr;
    }


    protected function callManipulation()
    {
        foreach (array_keys($this->namespace_output) as $key) {

            $counter = 0;
            $data = $this->getNamespace($key);
            $line = GrabDb::where('active', '=', 1)
                ->where('profile_id', '=', $this->profile_id)
                ->where('column_id', '=', ColumnDb::where('name', '=', $key)->pluck('id'))
                ->orderBy('position')->get();

            $script = new Script();

            foreach ($line as $row) {
                $i = 0;

                if ($counter == 0) {
                    $source = $this->source;
                } else {
                    $source = $this->get2Namespace($row->ColumnDb->name);
                }



                $script->setParameters($source, $row->grabFunction->function, $row->val1, $row->val2);
                $result = $script->applyScript();


                if (is_array($data)) {
                    if ($row->GrabFunction->grabMode->alias == "array" || $row->GrabFunction->grabMode->alias == "arrays2string") {
                        $this->set2Namespace($row->ColumnDb->name, $result);
                    } else {
                        $this->set2NamespaceArray($row->ColumnDb->name, $i++, $result);
                    }
                } else {
                    $this->set2Namespace($row->ColumnDb->name, $result);
                }
            }
        }
    }

    protected function switchFunction(Script $script, $source)
    {

        $script->setSource($source);
        return $script->applyFunction();


        var_dump($script);
        die;


        switch ($val->grabFunction->name) {
            case 'concateString' :
                return $this->filter->concateString($res, $val->val1, $val->val2);
                break;
            case 'strToLower' :
                return $this->filter->strToLower($res);
                break;
            case 'strToUpper' :
                return $this->filter->strToUpper($res);
                break;
            case 'htmlspecialcharsDecode' :
                return $this->filter->htmlspecialcharsDecode($res);
                break;
            case 'csUtf2Ascii' :
                return $this->filter->csUtf2Ascii($res);
                break;
            case 'concateString' :
                return $this->filter->concateString($res, $val->val1, $val->val2);
                break;
            case 'createAliasName' :
                return $this->filter->createAliasName($res);
                break;
            case 'clearEmptyRows' :
                return $this->filter->clearEmptyRows($res);
                break;
            case 'explode2ColumArrays' :
                return $this->filter->explode2ColumArrays($res, $val->val1);
                break;
            case 'filterSanitizeSpecialCharts' :
                return $this->filter->filterSanitizeSpecialCharts($res);
                break;
            case 'implode2String' :
                return $this->filter->implode2String($res, $val->val1);
                break;
            case 'trim' :
                return $this->filter->trim($res);
                break;
            case 'clearMultiSpace':
                return $this->filter->clearMultiSpace($res);
                break;
            case 'sortColumnArrays' :
                return $this->filter->sortColumnArrays($res);
                break;
            case 'loadSimpleCutString' :
                return $this->filter->loadSimpleCutString($res, $val->val1, $val->val2);
                break;
            case 'loadSimpleCutArrayMultiple' :
                return $this->filter->loadSimpleCutArrayMultiple($res, $val->val1, $val->val2);
                break;
            case 'strReplace' :
                return $this->filter->strReplace($res, $val->val1, $val->val2);
                break;
            case 'stripTags' :
                return $this->filter->stripTags($res);
                break;
            case 'rawUrlDecode' :
                return $this->filter->rawUrlDecode($res);
                break;
            case 'ifStrlenIsBigerReturn' :
                return $this->filter->ifStrlenIsBigerReturn($res, $val->val1, $val->val2);
                break;
            case 'ucfirst' :
                return $this->filter->ucfirst($res);
                break;
            case 'ucwords' :
                return $this->filter->ucwords($res);
                break;
            case 'togeterTwoColumn' :
                return $this->filter->togeterTwoColumn($res, $val->val1);
                break;
            case 'setValueToColumn' :
                return $this->filter->setValueToColumn($val->val1);
                break;
            case 'setArrayColum2String' :
                return $this->filter->setArrayColum2String($res, $val->val1);
                break;
            case 'loadSqlFromSync' :
                return $this->filter->loadSqlFromSync($res);
                break;
            case 'setValueFromOtherColumnArray' :
                return $this->filter->setValueFromOtherColumnArray($this->namespace_output[$val->val1], $val->val2);
                break;
            case 'fileGetContents' :
                return $this->filter->fileGetContents($res);
                break;
            default :
                break;
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