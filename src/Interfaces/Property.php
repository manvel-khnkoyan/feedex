<?php

namespace Manvel\Feedex\Interfasces;

interface SchemProperty {
    public function validateType($originType) : bool;
}