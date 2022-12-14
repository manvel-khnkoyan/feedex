<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class UniqueName extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return 
            is_string($value) && 
            strlen($value) > 0 && 
            strlen($value) < 255 &&
            strpos($value, ' ') === false &&
            ctype_lower($value);
    }
}
