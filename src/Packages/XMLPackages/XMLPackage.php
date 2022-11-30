<?php

namespace Manvel\Feedex\Packages;

use Manvel\Feedex\Schema;
use Manvel\Feedex\Package;

class XMLFilePackage extends Package
{
    function __construct(Schema $schema){
        parent::__construct($schema);
    }

    public function import() {}
    public function export() {}
}
