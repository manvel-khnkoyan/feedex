<?php

namespace Manvel\Feedex\Fields;

use Manvel\Feedex\Field;

class ArtistMeta extends Field {
    function __construct($value) {
        parent::__construct($value);
    }

    public function validate($originType): bool {
        return true;
    }
}
