<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Interfaces\SchemaProperty;

abstract class Collection implements SchemaProperty, Iterator {
    protected const TYPE = '';
    protected $list = [];
    protected $position = 0;

    public function validateType($originType) : bool {
        return is_a($this, $originType);
    }

    public function __construct($list) {
        $this->position = 0;
        foreach ($list as $item) {
            if (!is_a($item, self::TYPE)) {
                throw new \Exception(
                    "".get_class($this)." has invalid item ".print_r($item, true)
                );
            }
            $this->list[] = $item;
        }
    }

    public function rewind(): void {
        $this->position = 0;
    }

    public function current() {
        return $this->list[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next(): void {
        ++$this->position;
    }

    public function valid(): bool {
        return isset($this->list[$this->position]);
    }
}