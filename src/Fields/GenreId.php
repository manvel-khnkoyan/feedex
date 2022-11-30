<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class GenreId extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return 
            is_string($value) && 
            strlen($value) > 0 && 
            strlen($value) < 255 &&
            strpos($value, ' ') === false < 255 &&
            ctype_lower($value);
    }
}
