<?php

namespace App\Enums;

use App\Enums\Concerns\HasFilamentAttributes;

enum UserTypeEnum:int
{
    use HasFilamentAttributes;

    case ADMIN = 1;
    case TEACHER = 2;
    case STUDENT = 3;

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::TEACHER => 'Teacher',
            self::STUDENT => 'Student',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ADMIN => 'danger',
            self::TEACHER => 'warning',
            self::STUDENT => 'success',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::ADMIN => 'heroicon-o-shield-check',
            self::TEACHER => 'heroicon-o-academic-cap',
            self::STUDENT => 'heroicon-o-user',
        };
    }
}