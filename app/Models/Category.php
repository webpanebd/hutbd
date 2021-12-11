<?php

namespace App\Models;

use App\Traits\WithFileOperation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, WithFileOperation;
    protected $fillable = ["name", "slug", "image"];
    protected $deletable_files = ["image"];
    public $limit = 20;
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class)->take($this->limit);
    }
}
