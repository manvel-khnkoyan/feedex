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
        'images'     => 'Manvel\Feedex\List\Images',
        'resources'  => 'Manvel\Feedex\List\Resources',
        'metaData'   => 'Manvel\Feedex\Fields\ArtistMeta',
        'createdAt'  => 'Manvel\Feedex\Fields\UnixTimestamp'
    ];
}