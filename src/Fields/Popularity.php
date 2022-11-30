<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class Popularity extends Field {

    protected $operatiors = [
        ''
    ];

    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return (is_int($value) || is_float($value)) && $value >= 0 && $value <= 1;
    }
}
