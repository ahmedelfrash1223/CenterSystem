<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'site_title',
        'site_name',
        'logo_text',
        'hero_desc',
        'hero_gradient',
    ];
    protected $casts = [
        'hero_gradient' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
            
        $this->addMediaCollection('favicon')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/x-icon']);
    }

    public function getHeroImageUrl()
    {
        return $this->getFirstMediaUrl('hero_image');
    }

    public function getSiteImageUrl()
    {
        return $this->getFirstMediaUrl('favicon');
    }
}
