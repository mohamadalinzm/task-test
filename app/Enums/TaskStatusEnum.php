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


    public function name(): string
    {
        return match($this) {
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'In Progress',
            self::COMPLETED => 'Completed',
        };
    }


    // Method to get enum as key-value pairs
    public static function asArray(): array
    {
        $array = [];
        foreach(self::cases() as $case) {
            $array[$case->value] = $case->name();
        }
        return $array;
    }
}
