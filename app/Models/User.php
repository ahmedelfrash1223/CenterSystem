<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserTypeEnum;
use App\Enums\UserGenderEnum;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\AcademicLevelEnum;
use App\Enums\AcademicYearEnum;
use App\Enums\IsActiveEnum;

#[Hidden(['password', 'remember_token'])]

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'code',
        'phone',
        'city',
        'country',
        'type',
        'gender',
        'is_active',
        'birth_date',
        'parent_phone',
        'academic_level',
        'academic_year',
        'edu_ins',
        'qualification',
        'subject',
        'subscription_type',
        'branch_id',
    ];
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable ,SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
{
    return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

        'type' => UserTypeEnum::class,
        'gender' => UserGenderEnum::class,
        'academic_level' => AcademicLevelEnum::class,
        'academic_year' => AcademicYearEnum::class,
        'is_active' => IsActiveEnum::class,
    ];
}

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    protected static function booted(): void
{
    static::creating(function ($user) {

        if (! empty($user->code)) {
            return;
        }

        $prefix = match ($user->type) {
            UserTypeEnum::ADMIN => 'ADM',
            UserTypeEnum::TEACHER => 'TCH',
            UserTypeEnum::STUDENT => 'STD',
            default => 'USR',
        };

        do {

            $code = $prefix . '-' . strtoupper(
                substr(md5(uniqid(mt_rand(), true)), 0, 6)
            );

        } while (
            static::where('code', $code)->exists()
        );

        $user->code = $code;
    });
}
}
