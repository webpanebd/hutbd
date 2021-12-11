<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Nonstandard\UuidV6;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("slug");
            $table->string("name");
            $table->double("unit_price");
            $table->double("shipping_cost")->default(0);
            $table->integer("discount")->default(0);
            $table->integer("tax")->default(0);
            $table->boolean("hasReview")->default(1);
            $table->boolean("isActive")->default(1);
            $table->bigInteger("ratings")->default(0);
            $table->integer("available")->nullable();
            $table->text("description")->nullable();
            $table->string("featured_image");
            $table->integer("category_id")->unsigned()->index();
            $table->integer("subcategory_id")->unsigned()->index();
            $table->integer("brand_id")->unsigned()->index();
            $table->integer("seller_id")->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("no action");
            $table->foreign("subcategory_id")->references("id")->on("sub_categories")->onDelete("no action");
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete("no action");
            $table->foreign("seller_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
