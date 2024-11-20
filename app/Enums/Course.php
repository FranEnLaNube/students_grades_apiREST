<?php

namespace App\Enums;

enum Course: string
{
    case FIRST = '1r';
    case SECOND = '2n';
    case THIRD = '3r';
    case FOURTH = '4t';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
