<?php

namespace App\Enums;

use App\Enums\Concerns\HasFilamentAttributes;

enum IsActiveEnum:int
{
    use HasFilamentAttributes;

    case INACTIVE = 0;
    case ACTIVE = 1;

    public function label(): string
    {
        return match ($this) {
            self::INACTIVE => 'Inactive',
            self::ACTIVE => 'Active',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'danger',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::ACTIVE => 'heroicon-o-check-circle',
            self::INACTIVE => 'heroicon-o-x-circle',
        };
    }
}