<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class UnixTimestamp extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return ((string) (int) $value === $value) 
            && ($value <= PHP_INT_MAX)
            && ($value >= ~PHP_INT_MAX);
    }
}
