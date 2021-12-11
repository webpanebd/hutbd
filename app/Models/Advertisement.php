<?php

namespace App\Models;

use App\Traits\WithFileOperation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory, WithFileOperation;
    protected $fillable = [
        "image", "bold_text",
        "light_text", "location", "link"
    ];
    protected $deletable_files = ["image"];
}
