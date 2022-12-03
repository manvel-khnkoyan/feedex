<?php

namespace Manvel\Feedex\Lists;

use Manvel\Feedex\Collection;

class Genres extends Collection {
    protected $type = 'Manvel\Feedex\Schemas\Genre';

    function __construct(...$arg) {
        parent::__construct(...$arg);
    }

    public function validate($item) {
        if (!is_a($item, 'Manvel\Feedex\Schemas\Genre')) {
            throw new \Exception('Oops, invalid item ['.print_r($item, true).'] provided in Genres list');
        }
    }
}

