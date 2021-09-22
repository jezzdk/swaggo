<?php

namespace Jezzdk\Swaggo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Jezzdk\Swaggo\Swaggo openapi($openapi = null)
 * @method static \Jezzdk\Swaggo\Swaggo title($title = null)
 * @method static \Jezzdk\Swaggo\Swaggo version($version = null)
 * @method static \Jezzdk\Swaggo\Swaggo servers($servers = null)
 * @method static \Jezzdk\Swaggo\Swaggo schemas($schemas = null)
 * @method static \Jezzdk\Swaggo\Swaggo responses($responses = null)
 * @method static \Jezzdk\Swaggo\Swaggo parameters($parameters = null)
 * @method static \Jezzdk\Swaggo\Swaggo examples($examples = null)
 * @method static \Jezzdk\Swaggo\Swaggo requestBodies($requestBodies = null)
 * @method static \Jezzdk\Swaggo\Swaggo headers($headers = null)
 * @method static \Jezzdk\Swaggo\Swaggo securitySchemes($securitySchemes = null)
 * @method static \Jezzdk\Swaggo\Swaggo links($links = null)
 * @method static \Jezzdk\Swaggo\Swaggo callbacks($callbacks = null)
 * @method static \Jezzdk\Swaggo\Swaggo security($security = null)
 * @method static \Jezzdk\Swaggo\Swaggo addServer($url, $description = null)
 * @method static \Jezzdk\Swaggo\Swaggo get($uri, ?string $className = null, ?callable $callback = null)
 * @method static \Jezzdk\Swaggo\Swaggo post($uri, ?string $className = null, ?callable $callback = null)
 * @method static \Jezzdk\Swaggo\Swaggo patch($uri, ?string $className = null, ?callable $callback = null)
 * @method static \Jezzdk\Swaggo\Swaggo put($uri, ?string $className = null, ?callable $callback = null)
 * @method static \Jezzdk\Swaggo\Swaggo delete($uri, ?string $className = null, ?callable $callback = null)
 * @method static array toArray()
 * @method static string toJson()
 * @method static void dd()
 *
 * @see \Jezzdk\Swaggo\Swaggo
 */
class Swaggo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'swaggo';
    }
}
