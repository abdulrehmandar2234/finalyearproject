<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements HasMedia, Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('search_product');

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
        );
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
