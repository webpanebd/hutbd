<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPSTORM_META\map;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("title")->nullable();
            $table->string("logo")->default("img/logo.png");
            $table->string("favicon")->default("img/logo.png");
            $table->text("description")->nullable();
            $table->text("keywords")->nullable();
            $table->string("default_role")->default("customer");
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->boolean("can_register")->default(1);
            $table->text("address")->nullable();
            $table->integer("default_shipping_cost")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_infos');
    }
}
