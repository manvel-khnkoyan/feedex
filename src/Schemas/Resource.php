<?php

namespace Manvel\Feedex\Schemas;

use Manvel\Feedex\Schema;
use Manvel\Feedex\Resources;

class Resource extends Schema {
    function __construct(...$args){
        parent::__construct(...$args);
    }

    protected $__schema = [
        'resource' => [
            'type' => 'Manvel\Feedex\Resource',
            'required' => false,
        ],
        'source' => [
            'type' => 'Manvel\Feedex\Fields\ResourceSource',
            'required' => true,
        ],
        'item' => [
            'type' => 'Manvel\Feedex\Fields\ResourceItem',
            'required' => true,
        ]
    ];
}