<?php

namespace App\Enums;

enum AcademicLevelEnum:int
{
    case PRIMARY = 1;
    case PREPARATORY = 2;
    case SECONDARY = 3;
    case UNIVERSITY = 4;

    public function label(): string
    {
        return match ($this) {
            self::PRIMARY => 'Primary',
            self::PREPARATORY => 'Preparatory',
            self::SECONDARY => 'Secondary',
            self::UNIVERSITY => 'University',
        };
    }
}