<?php

namespace Aaran\Aaconfig\Src;

class Customise
{
    public static function enabled(string $feature): bool
    {
        return in_array($feature, config('aaconfig.features', []));
    }

    public static function hasTodoList(): bool
    {
        return static::enabled(static::todoList());
    }


    /**
     * Enable Todos features.
     * @return string
     */
    public static function todoList(): string
    {
        return 'todos';
    }

}
