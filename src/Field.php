<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Interfasces\SchemProperty;

/*
 * It coukld be eather primitiv eather 
 * non primitiv values */
abstract class Field implements SchemProperty {
    protected $value;
    protected $allowedOperators = [];
    abstract protected function validate($value): bool;

    public function validateType($type) : bool {
        return is_a($this, $type);
    }

    function __construct($value) {
        $this->set($value);
    }

    public function get() {
        return $this->value;
    }

    public function set($value) {
        if (!$this->validate($value)) {
            throw new \Exception("Invalid value: " + print_r($value, true));
        }
        $this->value = $value;
    }
}
