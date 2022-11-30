<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Package;

abstract class Feed {
    static public $version = '1.0';
    abstract public function destroy();
    abstract public function addPackage(Package $package);
    abstract public function addToStack();
}
