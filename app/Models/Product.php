<?php

namespace App\Models;

use App\Traits\WithFileOperation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, WithFileOperation, SoftDeletes;
    protected $fillable = [
        "category_id",
        "subcategory_id",
        "brand_id",
        "seller_id",
        "name",
        "slug",
        "unit_price",
        "tax",
        "discount",
        "shipping_cost",
        "ratings",
        "hasReview",
        "isActive",
        "slug",
        "featured_image",
        "available",
        "description"
    ];
    protected $deletable_files = ["featured_image"];

    public function attributeProducts()
    {
        return $this->hasMany(AttributeProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function seller()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
