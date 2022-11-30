<?php

namespace Manvel\Feedex\Interfaces;

interface SchemaProperty {
    public function validateType($originType) : bool;
}