<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in-progress';
    case COMPLETED = 'completed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
