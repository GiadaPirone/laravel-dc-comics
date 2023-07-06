<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fumettos', function (Blueprint $table) {
            $table->id();
            $table->string("title", 100);
            $table->text("description", 1000);
            $table->text("thumb")->nullable();
            $table->float("price",10,2);
            $table->string("series", 50)->nullable();
            $table->string("type",50)->nullable();
            $table->date("sale_date")->nullable();
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
        Schema::dropIfExists('fumettos');
    }
};
