<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Artists extends Collection {
    protected $type = 'Manvel\Feedex\Schemas\Artist';

    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Artist')) {
            throw new \Exception('Oops, invalid item ['.print_r($item, true).'] provided in Artist list');
        }
    }
}
