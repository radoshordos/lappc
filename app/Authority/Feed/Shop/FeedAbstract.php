<?php

namespace Authority\Xml\Feed;

abstract class FeedAbstract implements FeedInferface {

    public function tagProduct() {
        return '  <PRODUCT>'.$data['product'].'</PRODUCT>\n';
    }

    public function tagDescription() {
        return '  <DESCRIPTION>'.$data['description'].'</DESCRIPTION>\n';
    }

} 