<?php

namespace Authority\Feed;

class ColumnGenerator {

    protected $data;

    public function __construct(array $data, array $columns, $wrapper = '') {
        $this->data = $data;
    }

    public function Product() {
        return '  <PRODUCT>'.$this->data['product'].'</PRODUCT>\n';
    }

    public function Description() {
        return '  <DESCRIPTION>'.$this->data['description'].'</DESCRIPTION>\n';
    }

}