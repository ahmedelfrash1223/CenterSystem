<?php

namespace App\Enums;

enum UserTypeEnum:int
{
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
}