<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class ResourceType extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($value): bool {
        if (!isset($value['type']) || !isset($value['value'])) return false;
        if (!is_string($value['type']) || !is_string($value['value'])) return false;
        if ($value['type'] === 'Web-Link') {
            return preg_match('/^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$/i', $value['value']);
        }
        return false;
    }
}
