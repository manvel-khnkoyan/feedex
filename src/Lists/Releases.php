<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Release extends Collection {
    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Release')) {
            throw new \Exception('Oops, invalid item ['.var_dump($item).'] provided in Releases list');
        }
    }
}
