<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Website extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logos')
            ->useFallbackUrl('media/logo-placeholder.jpg')
            ->useFallbackPath(public_path('media/logo-placeholder.jpg'));
    }

    public function product_node()
    {
        return $this->hasOne(ProductNode::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
