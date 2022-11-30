<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class GRID extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($type): bool {
        return true;
    }
}
