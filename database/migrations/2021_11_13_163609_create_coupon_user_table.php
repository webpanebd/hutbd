<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_user', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned()->index();
            $table->integer("coupon_id")->unsigned()->index();
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("coupon_id")->references("id")->on("coupons")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_user');
    }
}
