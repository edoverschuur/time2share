<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

            $table->string("name");
            $table->string("description");
            $table->string("image")->default("/img/fiets.png");
            $table->string("lender")->nullable();
            
            $table->integer("lendTime");
            $table->integer("lendTimePlusTime")->nullable();

            $table->string("state")->default("Lendable");
            $table->foreign("state")->references("state")->on("state_of_product");

            $table->string("category");
            $table->foreign("category")->references("category")->on("category_of_product");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table){
            $table->dropForeign('product_user_id_foreign');
            $table->dropForeign('product_state_foreign');
            $table->dropForeign('product_category_foreign');
        });
        Schema::dropIfExists('product');
    }
}
