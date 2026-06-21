<?php

namespace App\Models;

use App\Enums\IsActiveEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'address',
        'is_active',
    ];

    protected $casts = [
        'is_active' => IsActiveEnum::class,
    ];

    protected static function booted(): void
    {
        static::creating(function ($branch) {

            if (empty($branch->code)) {

                $lastId = static::withTrashed()->max('id') + 1;

                $branch->code = 'BR-' . str_pad($lastId, 5, '0', STR_PAD_LEFT);
            }
        });
    }
}