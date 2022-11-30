<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class ImageResolution extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        if (!isset($value['width']) || !isset($value['height'])) return false;
        if (!is_int($value['width']) || !is_int($value['height'])) return false;

        if ($value['width'] < 10 || $value['width'] > 8000) return false;
        if ($value['height'] < 10 || $value['height'] > 8000) return false;

        return true;
    }
}
