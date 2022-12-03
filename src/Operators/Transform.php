<?php

namespace Manvel\Feedex\Operators;

use Iterator;
use Manvel\Feedex\Operator;
use Manvel\Feedex\Field;
use Manvel\Feedex\Schema;
use Manvel\Feedex\Resource;

class Transform extends Operator implements Iterator {
    private $list = [];
    private $type = null;
    private $position = 0;

    function __construct() {
        $this->position = 0;
    }

    public function validateType($originType) : bool {
        return !$this->type || $this->type === $originType;
    }

    public function checkItem($item) {
        $type = get_class($item);
        if ($this->type && $this->type !== $type) {
            throw new \Exception(
                "Transform operator should have same type items"
            );
        }
        if (!$this->type) $this->type = $type;
        if (
            !($item instanceof Field) &&
            !($item instanceof Schema) &&
            !($item instanceof Resource)
        ) {
            throw new \Exception(
                "Transform operator should have sone of Filed, Schema or Resource types"
            );
        }
    }

    public function push($item) {
        $this->checkItem($item);
        if ($item instanceof Schema) {
            if (!$item->completed()) {
                throw new \Exception(
                    "PUSH operator for [" . get_class($item) . "] by id: [".($item->id)."] should be completed"
                );
            }
        } 
        $this->list[] = ['push', $item];
        return $this;
    }

    public function pull($item) {
        $this->checkItem($item);
        $this->list[] = ['pull', $item];
        return $this;
    }

    public function rewind(): void {
        $this->position = 0;
    }

    public function current() : mixed {
        return $this->list[$this->position];
    }

    public function key() : mixed {
        return $this->position;
    }

    public function next(): void {
        ++$this->position;
    }

    public function valid(): bool {
        return isset($this->list[$this->position]);
    }
}