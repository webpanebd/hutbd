<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        "currency", "default_shipping_cost", "page_banner"
    ];
    protected $deletable_files = ["page_banner"];
}
