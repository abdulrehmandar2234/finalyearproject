<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('products')
            ->useFallbackUrl('media/product-placeholder.png')
            ->useFallbackPath(public_path('media/product-placeholder.png'));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
