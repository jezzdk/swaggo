<?php

namespace Jezzdk\Swaggo\Traits;

trait GetOrSet
{
    protected function getOrSet($key, $value = null)
    {
        if (is_null($value)) {
            return $this->$key;
        }

        $this->$key = $value;
        return $this;
    }
}