<?php

namespace Manvel\Feedex\Operators;
use Manvel\Feedex\Operator;

class Increase extends Operator {
    public function validateType($originType) : bool {
        return in_array(['Manvel\Feedex\Operators\Increase'], $originType::$allowedOperators);
    }
}