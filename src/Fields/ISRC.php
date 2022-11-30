<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class ISRC extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return true;
    }
}
