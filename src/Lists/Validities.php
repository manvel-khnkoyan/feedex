<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Validities extends Collection {
    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Validity')) {
            throw new \Exception('Oops, invalid item ['.print_r($item, true).'] provided in Validities list');
        }
    }
}
