<?php

namespace Jezzdk\Swaggo;

use Jezzdk\Swaggo\Traits\GetOrSet;

class Schema
{
    use GetOrSet;

    const TYPE_OBJECT = 'object';

    protected $type = 'object';

    protected $properties = [];

    public function type($type = null): self|string
    {
        return $this->getOrSet('type', $type);
    }

    public function addProperty($name, callable $callback = null): self
    {
        $property = new Property();
        $property->name($name);

        if (!is_null($callback)) {
            $callback($property);
        }

        $this->properties[$property->name()] = $property;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'required' => collect($this->properties)->filter(function(Property $property) {
                return $property->required();
            })->map->name()->values()->toArray(),
            'properties' => collect($this->properties)->map->toArray()->all(),
            'type' => $this->type(),
        ]);
    }
}