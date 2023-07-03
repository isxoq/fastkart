<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Product extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory,HasSlug;

    public $table = 'products';

    protected $appends = [
        'card_photo',
        'photos',
    ];

    protected $dates = [
        'sale_start',
        'end_sale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug',
        'category_id',
        'name',
        'price',
        'short_description',
        'description',
        'is_sale',
        'sale_price',
        'sale_start',
        'end_sale',
        'status',
        'meta_title',
        'meta_description',
        'meta_tags',
        'is_trend',
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getCardPhotoAttribute()
    {
        $file = $this->getMedia('card_photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getPhotosAttribute()
    {
        $files = $this->getMedia('photos');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getSaleStartAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setSaleStartAttribute($value)
    {
        $this->attributes['sale_start'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndSaleAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndSaleAttribute($value)
    {
        $this->attributes['end_sale'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name') // The column to generate the slug from
            ->saveSlugsTo('slug'); // The column where the slug will be stored
    }
}
