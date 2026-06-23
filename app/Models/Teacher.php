<?php

namespace App\Models;

use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Builder;

class Teacher extends User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        parent::booted();

        static::creating(function ($user) {
            $user->type = UserTypeEnum::TEACHER->value;
        });

        static::addGlobalScope('teachers', function (Builder $builder) {
            $builder->where('type', UserTypeEnum::TEACHER->value);
        });
    }
}