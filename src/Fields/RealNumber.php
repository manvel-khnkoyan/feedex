<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class RealNumber extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return (is_int($value) || ctype_digit($value)) && $value > 0;
    }
}
