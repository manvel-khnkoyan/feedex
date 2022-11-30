<?php

namespace Manvel\Feedex\Schemas;

use Manvel\Feedex\Schema;

class Track extends Schema {
    function __construct(...$args){
        parent::__construct(...$args);
    }

    protected $__schema = [
        'id' =>  'Manvel\Feedex\Fields\RealNumber',
        'artists' => 'Manvel\Feedex\List\Artists<Manvel\Feedex\Schema\Artist>',
        'cLine' => 'Manvel\Feedex\Fields\LicenseText',
        'pLine' => 'Manvel\Feedex\Fields\LicenseText',
        'discNumber' => 'Manvel\Feedex\Fields\RealNumber',
        'duration' => 'Manvel\Feedex\Fields\RealNumber',
        'popularity' => [
            'item' => 'Manvel\Feedex\Fields\Popularity',
            'default' => 0.1,
        ],
        'explicitType' => [
            'type' => 'Manvel\Feedex\Fields\ExplicitType',
            'required' => true,
        ],
        'grid' => [
            'type' => 'Manvel\Feedex\Fields\GRID',
            'required' => false,
        ],
        'ispn' => [
            'type' => 'Manvel\Feedex\Fields\ISPN',
            'required' => false,
        ],
        'isrc' => [
            'type' => 'Manvel\Feedex\Fields\ISRC',
            'required' => true,
        ],
        'genres' => [
            'type' => ['Manvel\Feedex\Schema\Genre'],
            'default' => [],
        ],
        'releases' => [
            'type' => ['Manvel\Feedex\Schema\Release'],
            'default' => [],
        ],
        'resources' => [
            'type' => ['Manvel\Feedex\Schema\Resource'],
            'default' => [],
        ],
        'title' => [
            'type' => 'Manvel\Feedex\Fields\Title',
            'required' => true,
        ],
        'trackNumber' => [
            'type' => 'Manvel\Feedex\Fields\RealNumber',
            'required' => true,
        ],
        'version' => [
            'type' => 'Manvel\Feedex\Fields\Title',
            'default' => '',
        ],
        'createdAt' => [
            'type' => 'Manvel\Feedex\Fields\UnixTimestamp',
            'default' => ''
        ]

        /*
        'licensor' => [
            'type' => 'Manvel\Feedex\Fields\Licensor',
            'required' => true,
        ],
        'reference' => [
            'type' => 'Manvel\Feedex\Fields\Reference',
            'required' => true,
        ],
        
        'territories' => [
            'type' => ['Manvel\Feedex\Schema\Territory'],
            'default' => [],
        ],
        */
    ];
}