<?php

namespace Authority\Xml;

class FeedReader {

    public function __construct($xmlSource) {

        if ($xmlSource) {
            foreach ($xmlSource as $val) {
                print_rs($val);
            }
        }
    }

} 