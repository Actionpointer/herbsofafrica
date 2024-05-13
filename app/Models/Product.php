<?php

namespace App\Models;


use App\Models\Review;
use App\Models\Category;
use App\Models\OrderItem;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title','tagline', 'section1', 'section2','section3','section4','category_id' ,'images' ,'faqs', 'stock' ,'prices',
        'published' ,'section3','download_link','tags','featured'
    ];

    protected $casts = [
        'prices'=> 'array',
        'faqs'=> 'array',
        'section1'=> 'array',
        'section2'=> 'array',
        'section3'=> 'array',
        'section4'=> 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPhotosAttribute(){
        return explode(',',$this->images);
    }

    public function getUrlAttribute(){
        return request()->host().'/product/'.$this->slug;
    }

    protected function prices(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    protected function faqs(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function orders(){
        return $this->hasMany(OrderItem::class);
    }

}
