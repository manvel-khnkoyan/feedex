<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Interfaces\SchemaProperty;

abstract class Resource implements SchemaProperty {
    abstract function copyTo(String $path);
    abstract function open();

    public function validateType($originType) : bool {
        return is_a($this, $originType);
    }
}
