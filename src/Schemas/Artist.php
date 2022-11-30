<?php

namespace Manvel\Feedex\Schemas;

use Manvel\Feedex\Schema;

class Artist extends Schema {
    function __construct(...$args){
        parent::__construct(...$args);
    }

    protected $__schema = [
        'id'         => 'Manvel\Feedex\Fields\NumericId',
        'name'       => 'Manvel\Feedex\Fields\Title',
        'uniqueName' => 'Manvel\Feedex\Fields\UniqueName',
        'genres'     => 'Manvel\Feedex\List\Genres',
        'images'     => 'Manvel\Feedex\List\Images<Manvel\Feedex\Schemas\Image>',
        'metaData'   => 'Manvel\Feedex\Fields\ArtistMeta',
        'resources'  => 'Manvel\Feedex\List\Resources<Manvel\Feedex\Schemas\Resource>',
        'createdAt'  => 'Manvel\Feedex\Fields\UnixTimestamp'
    ];
}