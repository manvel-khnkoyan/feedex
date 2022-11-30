<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class ExplicitType extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        return 
            is_string($value) && 
            in_array($value, ['explicit', 'implicit']);
    }
}
