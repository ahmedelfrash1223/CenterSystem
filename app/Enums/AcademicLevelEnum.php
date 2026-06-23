<?php

namespace App\Enums;

use App\Enums\Concerns\HasFilamentAttributes;

enum AcademicLevelEnum:int
{
    use HasFilamentAttributes;

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

    public function color(): string
    {
        return match ($this) {
            self::PRIMARY => 'info',
            self::PREPARATORY => 'warning',
            self::SECONDARY => 'danger',
            self::UNIVERSITY => 'success',
        };
    }

    public function icon(): string
    {
        return 'heroicon-o-academic-cap';
    }
}