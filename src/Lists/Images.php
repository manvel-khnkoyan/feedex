<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Images extends Collection {
    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Image')) {
            throw new \Exception('Oops, invalid item ['.var_dump($item).'] provided in Image list');
        }
    }
}
