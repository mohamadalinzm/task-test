<?php

namespace App\Enums;

enum TaskStatusEnum: int
{
    case PENDING = 1;
    case IN_PROGRESS = 2;
    case COMPLETED = 3;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
