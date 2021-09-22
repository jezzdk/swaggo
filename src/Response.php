<?php

namespace Jezzdk\Swaggo;

use Jezzdk\Swaggo\Traits\GetOrSet;

class Response
{
    use GetOrSet;

    const TYPE_JSON = 'application/json';
    const TYPE_XML = 'application/xml';
    const TYPE_FORMDATA = 'application/x-www-form-urlencoded';
    const TYPE_PLAIN = 'text/plain';

    protected $statusCode = 200;

    protected $description;

    protected $content = [];

    public function statusCode($statusCode = null): self|int
    {
        return $this->getOrSet('statusCode', $statusCode);
    }

    public function description($description = null): self|string
    {
        return $this->getOrSet('description', $description);
    }

    public function addContentType($contentType, callable $callback = null): self
    {
        $schema = new Schema();

        if (!is_null($callback)) {
            $callback($schema);
        }

        $this->content[$contentType] = $schema;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'description' => $this->description(),
            'content' => collect($this->content)->mapWithKeys(function(Schema $schema, $contentType){
                return [
                    $contentType => [
                        'schema' => $schema->toArray()
                    ]
                ];
            })->all()
        ]);
    }
}