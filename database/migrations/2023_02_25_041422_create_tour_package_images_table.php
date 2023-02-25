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
        Schema::create('tour_package_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PACKAGE_ID')->nullable(true);
            $table->foreign('PACKAGE_ID')->references('id')->on('tour_packages')->onDelete('cascade');

            $table->string('FILE_NAME')->nullable(true);
            $table->string('FILE_PATH')->nullable(true);
            $table->integer('SORT_ORDER')->nullable(true);
            $table->string('CREATOR')->nullable(true);
            $table->string('EDITOR')->nullable(true);
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
        Schema::dropIfExists('tour_package_images');
    }
};
