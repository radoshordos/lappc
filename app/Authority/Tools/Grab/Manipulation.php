<?php namespace Authority\Tools\Grab;

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
        $gp = GrabProfile::where('charset', '=', $profile_id)->first();

        $this->script = new Script();
        $this->profile_id = intval($profile_id);
        $this->charset = isset($gp->charset) ? $gp->charset : NULL;
        $this->source = $this->executeSource($source);
        $this->callManipulation();
    }

    public function getSourceInput()
    {
        return htmlentities($this->source);
    }

    private function executeSource($source)
    {
        if (\URL::isValidUrl(trim($source)) == TRUE) {
            if (strtoupper($this->charset) == "UTF-8") {
                return file_get_contents(trim($source));
            } else {
                return iconv($this->charset, "UTF-8", trim($source));
            }
        }
    }
/*
    protected function getListExecutedMethodInColumn($column_id)
    {
        return $this->db->fetchAll($this->db->select()
                ->from("filter", ["filter_val1", "filter_val2"])
                ->joinInner("columna", Model_Zendb::ZEND_FILTER_2_COLUMNA, ["columna_name"])
                ->joinInner("filter2type", Model_Zendb::ZEND_FILTER_2_FILTER2TYPE, ["ft_function_name", "ft_id_mode"])
                ->joinInner("filter2mode", "filter2type.ft_id_mode = filter2mode.fm_id", ["fm_alias"])
                ->where("filter_active = 1")
                ->where("filter_id_profile = ?", intval($this->getFilterProfilleId()))
                ->where("filter_id_column = ?", $column_id)
                ->order(["filter_id"])
        );
    }
*/
    protected function callManipulation()
    {

            $line = GrabDb::where('active', '=', 1)->where('profile_id', '=', $this->profile_id)->orderBy('column_id','position','id')->get();
            $source = $this->source;
            $x = 0;

            foreach ($line as $val) {
                $i = 0;
                /*
                if (++$x > 1) {
                    $source = $this->get2Namespace($val->ColumnDb->name);
                }
                */
                if (is_array($source)) {
                    if ($val->GrabFunction->grabMode->alias == "array" || $val->GrabFunction->grabMode->alias == "arrays2string") {
                        $this->set2Namespace($val->ColumnDb->name, $this->switchFunction($source, $val));
                    } else {
                        foreach ($source as $v) {
                            $this->set2NamespaceArray($val->ColumnDb->name, $i++, $this->switchFunction($v, $val));
                        }
                    }
                } else {
                    $this->set2Namespace($val->ColumnDb->name, $this->switchFunction($source, $val));
                }
            }

    }

    protected function set2Namespace($namespace, $value)
    {
        $this->namespace_output[$namespace] = $value;
    }

    protected function set2NamespaceArray($namespace, $line, $value)
    {
        $this->namespace_output[$namespace][$line] = $value;
    }

    protected function get2Namespace($namespace)
    {
        return $this->namespace_output[$namespace];
    }

    public function getNamespaceOutput()
    {
        return $this->namespace_output;
    }

    protected function switchFunction($res, $val)
    {

        switch ($val->ft_function_name) {

            case 'concateString' :
                return $this->filter->concateString($res, $val->filter_val1, $val->filter_val2);
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
                return $this->filter->concateString($res, $val->filter_val1, $val->filter_val2);
                break;
            case 'createAliasName' :
                return $this->filter->createAliasName($res);
                break;
            case 'clearEmptyRows' :
                return $this->filter->clearEmptyRows($res);
                break;
            case 'explode2ColumArrays' :
                return $this->filter->explode2ColumArrays($res, $val->filter_val1);
                break;
            case 'filterSanitizeSpecialCharts' :
                return $this->filter->filterSanitizeSpecialCharts($res);
                break;
            case 'implode2String' :
                return $this->filter->implode2String($res, $val->filter_val1);
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
                return $this->filter->loadSimpleCutString($res, $val->filter_val1, $val->filter_val2);
                break;
            case 'loadSimpleCutArrayMultiple' :
                return $this->filter->loadSimpleCutArrayMultiple($res, $val->filter_val1, $val->filter_val2);
                break;
            case 'strReplace' :
                return $this->filter->strReplace($res, $val->filter_val1, $val->filter_val2);
                break;
            case 'stripTags' :
                return $this->filter->stripTags($res);
                break;
            case 'rawUrlDecode' :
                return $this->filter->rawUrlDecode($res);
                break;
            case 'ifStrlenIsBigerReturn' :
                return $this->filter->ifStrlenIsBigerReturn($res, $val->filter_val1, $val->filter_val2);
                break;
            case 'ucfirst' :
                return $this->filter->ucfirst($res);
                break;
            case 'ucwords' :
                return $this->filter->ucwords($res);
                break;
            case 'togeterTwoColumn' :
                return $this->filter->togeterTwoColumn($res, $val->filter_val1);
                break;
            case 'setValueToColumn' :
                return $this->filter->setValueToColumn($val->filter_val1);
                break;
            case 'setArrayColum2String' :
                return $this->filter->setArrayColum2String($res, $val->filter_val1);
                break;
            case 'loadSqlFromSync' :
                return $this->filter->loadSqlFromSync($res);
                break;
            case 'setValueFromOtherColumnArray' :
                return $this->filter->setValueFromOtherColumnArray($this->namespace_output[$val->filter_val1], $val->filter_val2);
                break;
            case 'fileGetContents' :
                return $this->filter->fileGetContents($res);
                break;
            default :
                break;
        }
    }
}