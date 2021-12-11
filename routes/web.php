<?php

use App\Http\Controllers\SocialiteController;
use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Livewire\Admin\Categories\Index as CategoriesIndex;
use App\Http\Livewire\Admin\Components\EditAd;
use App\Http\Livewire\Admin\Pages\ManageAds;
use App\Http\Livewire\Admin\Pages\ProductSettings;
use App\Http\Livewire\Admin\Pages\Profile;
use App\Http\Livewire\Admin\Pages\Roles;
use App\Http\Livewire\Admin\Products\SingleProduct;
use App\Http\Livewire\Admin\Pages\Siteinfo;
use App\Http\Livewire\Admin\Products\AddNewProduct;
use App\Http\Livewire\Admin\Products\AddProperties;
use App\Http\Livewire\Admin\Products\Attributes;
use App\Http\Livewire\Admin\Products\Coupons;
use App\Http\Livewire\Admin\Products\EditProduct;
use App\Http\Livewire\Admin\Products\Products;
use App\Http\Livewire\Admin\Products\ProductTrash;
use App\Http\Livewire\Admin\Profile\Show;
use App\Http\Livewire\Admin\Subcategories\Index as SubcategoriesIndex;
use App\Http\Livewire\Admin\Users\Index;
use App\Http\Livewire\Admin\Users\Trash;
use App\Http\Livewire\Frontend\Pages\Home;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Admin\Pages\SocialIconManager;
use App\Http\Livewire\Frontend\Pages\CartList;
use App\Http\Livewire\Frontend\Pages\Shop;
use App\Http\Livewire\Frontend\Pages\SingleCategory;
use App\Http\Livewire\Frontend\Pages\SingleProduct as PagesSingleProduct;
use App\Http\Livewire\Frontend\Pages\WishList;

Route::get('/', Home::class);
Route::get("/shop", Shop::class)->name('shop');
Route::get("/category/{slug}", SingleCategory::class);
Route::get("/product/{slug}", PagesSingleProduct::class);
Route::get("/cartlist", CartList::class);
Route::get("/wishlist", WishList::class);

/*======================== All authentication routes goes here ============================*/
Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);
Route::get("/login/{provider}", [SocialiteController::class, "redirect"]);
Route::get("/login/{provider}/callback", [SocialiteController::class, "callback"]);


/*======================== Routes for authenticated users ============================*/
Route::group(["middleware" => "auth"], function () {
    Route::get('/home', Siteinfo::class)->name('home');
    Route::group(["middleware" => ["role:admin"]], function () {
        Route::get("/siteinfo", Siteinfo::class)->name("siteinfo");
        Route::get("/social-icon-manager", SocialIconManager::class);
        Route::get("/manage-ads", ManageAds::class);
        Route::get("/ad/edit/{id}", EditAd::class);
        Route::get("/roles", Roles::class)->name('roles');
        Route::get("/product-settings", ProductSettings::class);
    });

    Route::get("/profile", Profile::class)->name("profile");
    /*==================== User related routes ===================*/
    Route::group(["middleware" => ["permission:view-user|create-user|edit-user|delete-user"]], function () {
        Route::get("/users/{role}", Index::class)->name('users.role');
        Route::get("/user/{id}", Show::class)->name('user.show');
        Route::get("/users/{role}/trash", Trash::class)->name('users.trash');
    });



    /*================ Category and subcategory related routes ============ */
    Route::group(["middleware" => ["permission:view-category|create-category|edit-category|delete-category"]], function () {
        Route::get("/category", CategoriesIndex::class)->name("category.index");
    });

    Route::group(["middleware" => ["permission:view-subcategory|create-subcategory|edit-subcategory|delete-subcategory"]], function () {
        Route::get("/sub-category", SubcategoriesIndex::class)->name("sub-category.index");
    });
    /*============== Brand related Routes ==================*/
    Route::group(["middleware" => ["permission:view-brand|create-brand|edit-brand|delete-brand"]], function () {
        Route::get("/brands", BrandComponent::class)->name("brands");
    });

    /*============== Coupon related Routes ==================*/
    Route::group(["middleware" => ["permission:view-coupon|create-coupon|edit-coupon|delete-coupon"]], function () {
        Route::get("/coupons", Coupons::class)->name("coupons");
    });
    /*============== product attributes related Routes ==================*/
    Route::group(["middleware" => ["permission:view-attribute|create-attribute|edit-attribute|delete-attribute"]], function () {
        Route::get("/attributes", Attributes::class)->name("attributes");
    });
    Route::group(["middleware" => ["permission:view-product|create-product|edit-product|delete-product"]], function () {
        Route::get("/products", Products::class)->name("products");
    });
    Route::get("/add-new-product", AddNewProduct::class)->middleware("permission:create-product");
    Route::get("/product/add-properties/{id}", AddProperties::class)->middleware("permission:create-product");
    Route::get("/product/edit/{id}", EditProduct::class)->middleware("permission:edit-product");
    Route::get("/product/show/{id}", SingleProduct::class)->middleware("permission:view-product");
    Route::get("/products/trash", ProductTrash::class)->middleware("permission:create-product|delete-product|edit-product");
});

Route::view("/dummy", "dummy");
