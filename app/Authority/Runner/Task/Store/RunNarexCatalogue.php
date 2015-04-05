<?php namespace Authority\Runner\Task\Store;

class RunNarexCatalogue extends AbstractRunDev implements iItem
{
    public function isUseRequired()
    {
        return ((strlen($this->getSyncItemsCodeProduct()) > 1) && (strlen($this->getSyncProdName()) > 1) && (intval($this->getSyncIdDev()) > 0)) ? TRUE : FALSE;
    }

    function setSyncItemsCodeProduct()
    {
        if (isset($this->shopItem['ArtCode'])) {
            $this->syncItemsCodeProduct = (string)$this->shopItem['ArtCode'];
        }
    }

    function setSyncProdName()
    {
        if (isset($this->shopItem['ArtCode'])) {
            $this->syncProdName = "Narex " . (string)trim($this->shopItem['ArtCode']);
        }
    }

    function setSyncIdDev()
    {
        $this->syncIdDev = 10;
    }

    function setSyncProdDesc()
    {
        if (isset($this->shopItem['Product'])) {
            $this->syncProdDesc = (string)trim($this->shopItem['Product']);
        }
    }

    function setSyncCategoryText()
    {
        if (isset($this->shopItem['Group'])) {
            $this->syncCategoryText = $this->shopItem['Group']->Number . " - " . $this->shopItem['Group']->Name;
        }
    }

    function setSyncUrl()
    {
        if (isset($this->shopItem['ProductUrl'])) {
            $this->syncUrl = (string)trim($this->shopItem['ProductUrl']);
        }
    }

    public function storeImages()
    {
        if (isset($this->shopItem['Images'])) {
            foreach ((array)$this->shopItem['Images'] as $row) {
                foreach ((array)$row as $val) {
                    if (filter_var($val, FILTER_VALIDATE_URL) == TRUE) {
                        $this->storeArray->setImg($val);
                    }
                }
            }
        }
    }

    public function storeDescriptions()
    {
        if (isset($this->shopItem['Descriptions'])) {
            foreach ((array)$this->shopItem['Descriptions'] as $row) {
                foreach ((array)$row as $val) {
                    if (!empty($val)) {
                        $this->storeArray->setMediaDescriptions(trim(strip_tags(strtr($val, ["»" => ""]))));
                    }
                }
            }
        }
    }

    public function storePackageContents()
    {
        if (isset($this->shopItem['PackageContents'])) {
            foreach ((array)$this->shopItem['PackageContents'] as $row) {
                foreach ((array)$row as $val) {
                    if (!empty($val)) {
                        $this->storeArray->setMediaPackagecontents(trim(strip_tags(strtr($val, ["»" => ""]))));
                    }
                }
            }
        }
    }

    public function storeParameters()
    {
        if (isset($this->shopItem['Parameters'])) {
            foreach ((array)$this->shopItem['Parameters'] as $row) {

                if (isset($row->Name)) {

                    $line = "";
                    if (isset($row->Name)) {
                        $line .= trim($row->Name) . " :";
                    }
                    if (isset($row->Value)) {
                        $line .= " " . trim($row->Value);
                    }
                    if (isset($row->Unit)) {
                        $line .= " " . trim($row->Unit);
                    }

                    $line = strtr($line, ["$" => "", "&nbsp;" => " ", '#/min' => "min-1", "#" => '', '…' => '']);
                    $line = preg_replace('/[\s]+/mu', ' ', $line);
                    $this->storeArray->setMediaParameters(trim(strip_tags($line)));

                } else {

                    foreach ((array)$row as $val) {

                        if (!empty($val)) {

                            $line = "";
                            if (isset($val->Name)) {
                                $line .= trim($val->Name) . " :";
                            }
                            if (isset($val->Value)) {
                                $line .= " " . trim($val->Value);
                            }
                            if (isset($val->Unit)) {
                                $line .= " " . trim($val->Unit);
                            }

                            $line = strtr($line, ["$" => "", "&nbsp;" => " ", '#/min' => "min-1", "#" => '', '…' => '']);
                            $line = preg_replace('/[\s]+/mu', ' ', $line);
                            $this->storeArray->setMediaParameters(trim(strip_tags($line)));
                        }
                    }
                }
            }
        }
    }

    function setSyncWarranty()
    {
        // TODO: Implement setSyncWarranty() method.
    }

    function setSyncItemsCodeEan()
    {
        // TODO: Implement setSyncItemsCodeEan() method.
    }

    function setSyncItemsPriceStandard()
    {
        // TODO: Implement setSyncItemsPriceStandard() method.
    }

    function setSyncItemsPriceAction()
    {
        // TODO: Implement setSyncItemsPriceAction() method.
    }

    function setSyncItemsAvailabilityCount()
    {
        // TODO: Implement setSyncItemsAvailabilityCount() method.
    }

    function setSyncProdWeight()
    {
        // TODO: Implement setSyncProdWeight() method.
    }

    function storeAccessory()
    {
        // TODO: Implement storeAccessory() method.
    }

    function storeFiles()
    {
        // TODO: Implement storeFiles() method.
    }

    function storeYoutube()
    {
        // TODO: Implement storeYoutube() method.
    }
}