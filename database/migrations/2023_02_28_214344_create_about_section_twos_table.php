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
        Schema::create('about_section_twos', function (Blueprint $table) {
            $table->id();
            $table->string('TITLE');
            $table->string('SUBTITLE');
            $table->string('VIDEO_PATH')->nullable(true);
            $table->string('TEXT_1');
            $table->string('TEXT_2');
            $table->string('TEXT_3');
            $table->string('TEXT_4');
            $table->string('FILE_NAME')->nullable(true);
            $table->string('FILE_PATH')->nullable(true);
            $table->integer('SORT_ORDER')->nullable(true);
            $table->tinyInteger('STATUS')->default('0');
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
        Schema::dropIfExists('about_section_twos');
    }
};
