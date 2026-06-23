<?php

namespace App\Enums;

enum AcademicYearEnum:int
{
    case FIRST = 1;
    case SECOND = 2;
    case THIRD = 3;
    case FOURTH = 4;
    case FIFTH = 5;
    case SIXTH = 6;

    public function label(): string
    {
        return match ($this) {
            self::FIRST => 'First Year',
            self::SECOND => 'Second Year',
            self::THIRD => 'Third Year',
            self::FOURTH => 'Fourth Year',
            self::FIFTH => 'Fifth Year',
            self::SIXTH => 'Sixth Year',
        };
    }
}