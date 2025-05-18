<?php

namespace App\Traits;

trait NewStaticTrait
{
    public static function new(): static
    {
        return new static();
    }
}
