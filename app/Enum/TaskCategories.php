<?php

namespace App\Enum;

enum TaskCategories: string
{
    case Archived = 'finie';
    case Todo = 'a_faire';
    case InProgress = 'en_cours';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

