<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Tracks extends Collection {
    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Track')) {
            throw new \Exception('Oops, invalid item ['.print_r($item, true).'] provided in Tracks list');
        }
    }
}
