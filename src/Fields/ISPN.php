<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class ISPN extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return true;
    }
}
