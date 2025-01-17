<?php

namespace App\Enum;

enum UserRoles: string
{
    case Benevole = 'benevole';
    case Admin = 'admin';
    case Comptable = 'comptable';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

