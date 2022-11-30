<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class Title extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return is_string($value) && strlen($value) > 0 && strlen($value) < 255;
    }
}
