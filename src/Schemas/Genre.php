<?php

namespace Manvel\Feedex\Schemas;

use Manvel\Feedex\Schema;

class Genre extends Schema {
    function __construct(...$args){
        parent::__construct(...$args);
    }

    protected $__schema = [
        'id' => 'Manvel\Feedex\Fields\GenreId',
        'name' => 'Manvel\Feedex\Fields\GenreName'
    ];
}