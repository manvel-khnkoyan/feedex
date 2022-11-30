<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Tracks extends Collection {
    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Track')) {
            throw new \Exception('Oops, invalid item ['.var_dump($item).'] provided in Tracks list');
        }
    }
}
