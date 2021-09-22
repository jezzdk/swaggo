<?php

namespace Jezzdk\Swaggo;

use Jezzdk\Swaggo\Traits\GetOrSet;

class Path
{
    use GetOrSet;

    protected $path;

    protected $requests = [];

    public function path($path = null)
    {
        return $this->getOrSet('path', $path);
    }

    public function addRequest(Request $request)
    {
        $this->requests[$request->method()] = $request;
        return $this;
    }

    public function toArray()
    {
        return collect($this->requests)->map->toArray()->all();
    }
}
