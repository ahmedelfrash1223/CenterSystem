<?php

namespace App\Models;

use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        parent::booted();

        static::creating(function ($user) {
            $user->type = UserTypeEnum::ADMIN->value;
        });

        static::addGlobalScope('admins', function (Builder $builder) {
            $builder->where('type', UserTypeEnum::ADMIN->value);
        });
    }
}