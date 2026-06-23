<?php

namespace App\Enums;

use App\Enums\Concerns\HasFilamentAttributes;

enum UserGenderEnum:int
{
    use HasFilamentAttributes;

    case MALE = 1;
    case FEMALE = 2;

    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::MALE => 'info',
            self::FEMALE => 'pink',
        };
    }

    public function icon(): string
    {
        return 'heroicon-o-user-circle';
    }
}