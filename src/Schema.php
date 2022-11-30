<?php

namespace Manvel\Feedex;

use Manvel\Feedex\Interfasces\SchemProperty;

abstract class Schema implements SchemProperty{

    const CREATE = 'Create';
    const UPDATE = 'Update';
    const DELETE = 'Delete';

    protected $__type = null;

    public function type() {
        return $this->__type;
    }
    
    public function validateType($originType) : bool {
        return is_a($this, $originType);
    }

    public function __get($key) {
        if (isset($this->__properties[$key])) {
            return $this->__properties[$key];
        }
        return null;
    }

    public function __set($key, $value) {
        if (isset($this->__properties[$key])) {
            $this->__properties[$key] = $value;
        }
    }

    function __construct($properites, $action = Schema::CREATE) {
        $this->__type = $action;
        if (!in_array($action, [Schema::CREATE, Schema::UPDATE, Schema::DELETE])) {
            throw new \Exception(
                "Oops, invalid action provided: " . $action
            );
        }

        // Check ID
        if (!isset($properites['id'])) {
            throw new \Exception(
                "Internal ".get_class($this)." scheme should have [id] key"
            );
        }

        // Loop through input input
        foreach ($properites as $key => $item) {
            if (!isset($this->__schema[$key])) {
                throw new \Exception(
                    "Internal ".get_class($this)." scheme $key not found"
                );
            }

            // Get Schem
            $schema = $this->__schema[$key];
            if (!(is_a($item, $schema))) {
                throw new \Exception(
                    "Schema ".get_class($item)." should be $schema"
                );
            }

            // check if implemntees SchemProperty
            if (!($item instanceof SchemProperty)) {
                throw new \Exception(
                    "Schema ".get_class($this)." has unknow property: $key. " . 
                    "Schema property must be List, Field, Schema, Resource or Operator"
                );  
            }

            // Validate Type
            if ($item->validateType($schema)) {
                throw new \Exception(
                    "Schema ".get_class($this)." has unknow property: $key has invalid value"
                ); 
            }
        }

        /*
         * On Create should be all attributes */
        if ($this->__type === Schema::CREATE) {
            foreach ($this->__schema as $key => $schema) {
                if (!isset($input[$key])) {
                    throw new \Exception("Missing ".get_class($this)." -> [$key] key");
                }
            }
        }

        // If everithing is ok then own Properities
        $this->__properties = $properites;
    }
}
