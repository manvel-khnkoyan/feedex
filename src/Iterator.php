<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Package;

abstract class Iterator {   
    abstract public function open();
    abstract public function nextPackage(Package $package);
}
