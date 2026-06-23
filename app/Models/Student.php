<?php

namespace App\Models;

use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Builder;

class Student extends User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        parent::booted();

        static::creating(function ($user) {
            $user->type = UserTypeEnum::STUDENT->value;
        });

        static::addGlobalScope('students', function (Builder $builder) {
            $builder->where('type', UserTypeEnum::STUDENT->value);
        });
    }
}