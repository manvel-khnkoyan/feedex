<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Territories extends Collection {
    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Territoty')) {
            throw new \Exception('Oops, invalid item ['.var_dump($item).'] provided in Territories list');
        }
    }
}
