<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory, HasSlug;

    public $table = 'categories';

    protected $appends = [
        'icon',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug',
        'name',
        'category_id',
        'status',
        'sort_order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function categoryCategories()
    {
        return $this->hasMany(self::class, 'category_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(self::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name') // The column to generate the slug from
            ->saveSlugsTo('slug'); // The column where the slug will be stored
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function childrenRecursive()
    {
        return $this->hasMany(Category::class, 'category_id')->with('childrenRecursive');
    }

    public function iconUrl()
    {
        $media = $this->getMedia('icon')->last();
        return $media?->getUrl();
    }

    public function url()
    {
        return url("category/{$this->slug}");
    }
}
