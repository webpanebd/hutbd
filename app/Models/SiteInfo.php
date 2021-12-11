<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "title", "logo", "favicon", "description", "keywords",
        "default_role", "can_register", "address", "email", "phone", "default_shipping_cost"
    ];
}
