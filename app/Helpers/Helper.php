<?php

use App\Models\Advertisement;
use App\Models\Cart;
use App\Models\ProductSettings;
use App\Models\SiteInfo;
use App\Models\SocialIcon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

function site()
{
    return SiteInfo::all()->first();
}


function social_icons()
{
    return SocialIcon::all();
}
function createDefaultAvatar($name)
{
    $name = implode("+", explode(" ", $name));
    $avatar = "https://ui-avatars.com/api/?background=0000FF&color=fff&size=240&name=" . $name;
    return $avatar;
}


function upload($file, $folder, $disk = null, $current_path = null)
{
    if (file_exists($current_path)) {
        unlink($current_path);
    }
    if (!is_null($file)) {
        if (is_null($disk)) {
            $disk = config("filesystems.default");
        }
        $extension = $file->getClientOriginalExtension();
        $filename = md5(time() . uniqid()) . "." . $extension;
        $path = $file->storeAs($folder, $filename, $disk);
        return "storage/" . $path;
    } else {
        return "";
    }
}

function updateFile($file, $folder, $disk = null, $previous_path)
{
    if (!is_null($file)) {
        if (is_null($disk)) {
            $disk = config("filesystems.default");
        }
        deleteFile($previous_path);
        $extension = $file->getClientOriginalExtension();
        $filename = md5(time() . uniqid()) . "." . $extension;
        $path = $file->storeAs($folder, $filename, $disk);
        return "storage/" . $path;
    } else {
        return "";
    }
}

function roles()
{
    return Role::all();
}




function deleteFile($path)
{
    if (file_exists($path)) {
        unlink($path);
    }
}


function showAd($loaction)
{
    $ad = Advertisement::where("location", $loaction)->first();
    return $ad;
}



function netPrice($product)
{
    return $product->shipping_cost + ($product->unit_price - ($product->unit_price * $product->discount) / 100) + ($product->unit_price * $product->tax) / 100;
}


function hasCart($product_id)
{

    try {
        if (Auth::check()) {
            $cart = Cart::where("user_id", Auth::user()->id)->where("product_id", $product_id)->first();
            if ($cart) {
                return true;
            } else {
                return false;
            }
        }
    } catch (ModelNotFoundException $th) {

        throw $th;
    }
}


function cartTotal($carts, $coupon_discount = 0)
{
    $total = 0;
    foreach ($carts as $cart) {
        $total = $total + netPrice($cart->product) * $cart->quantity;
    }
    return ceil($total - ($total * $coupon_discount) / 100);
}


function product_settings()
{
    return ProductSettings::firstOrFail();
}
