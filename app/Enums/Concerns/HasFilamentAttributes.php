<?php

namespace App\Enums\Concerns;

trait HasFilamentAttributes
{
    public static function getLabelFromState(mixed $state): ?string
    {
        $enum = $state instanceof static
            ? $state
            : static::tryFrom((int) $state);

        return $enum?->label();
    }

    public static function getColorFromState(mixed $state): ?string
    {
        $enum = $state instanceof static
            ? $state
            : static::tryFrom((int) $state);

        return $enum?->color();
    }

    public static function getIconFromState(mixed $state): ?string
    {
        $enum = $state instanceof static
            ? $state
            : static::tryFrom((int) $state);

        return $enum?->icon();
    }
}