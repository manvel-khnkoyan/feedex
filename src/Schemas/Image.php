<?php


namespace Manvel\Feedex\Schemas;

use Manvel\Feedex\Schema;

class Image extends Schema {

    function __construct(...$args){
        parent::__construct(...$args);
    }

    protected $__schema = [
        'resource' => [
            'type' => 'Manvel\Feedex\Resource',
            'required' => false,
        ],
        'source' => [
            'type' => 'Manvel\Feedex\Fields\ImageSource',
            'required' => true,
        ],
        'resolution' => [
            'type' => 'Manvel\Feedex\Fields\ImageResolution',
            'required' => false,
        ],
        'value' => [
            'type' => 'Manvel\Feedex\Fields\ImageValue',
            'required' => true,
        ]
    ];
}
