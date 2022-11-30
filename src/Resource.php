<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Interfasces\SchemProperty;

abstract class Resource implements SchemProperty {
    abstract function copyTo(String $path);
    abstract function open();

    public function validateType($originType) : bool {
        return is_a($this, $originType);
    }
}
