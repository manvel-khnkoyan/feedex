<?php

namespace Manvel\Feedex\Resources;

use Manvel\Feedex\Resource;

class HttpURL extends Resource
{
    private $url;

    function __construct($url)
    {
        $this->url = $url;
    }
    
    public function copyTo($path) {
        copy($this->url, $path);
    }

    public function open() {
        return fopen($this->url);
    }
}
