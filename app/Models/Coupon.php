<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Coupon extends Model
{
    use HasFactory;
    protected $fillable=['code','starts_at','expires_at','discount'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function usedBy($user_id){
        return DB::table("coupon_user")->where("user_id",$user_id)->first();
    }
}
