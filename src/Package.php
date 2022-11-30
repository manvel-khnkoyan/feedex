<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Schema;

abstract class Package {
    protected Schema $schema;
    abstract public function import();
    abstract public function export();

    function __construct(Schema $schema){
        $this->schema = $schema;
    }
}
