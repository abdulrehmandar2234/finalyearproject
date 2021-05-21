<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('slider-resize')
            ->width(416)
            ->height(420)
            ->sharpen(10)
            ->performOnCollections('slider-image');
        $this->addMediaConversion('slider-resize')
            ->width(1920)
            ->height(422)
            ->sharpen(10)
            ->performOnCollections('slider-banner');
    }
}
