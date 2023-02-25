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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('PACKAGE_NAME');
            $table->string('DURATION');
            $table->string('TOUR_TYPE');
            $table->text('DESTINATION');
            $table->string('COST');

            $table->mediumText('OVERVIEW');

            $table->string('FILE_NAME')->nullable(true);
            $table->string('FILE_PATH')->nullable(true);
            $table->string('SLUG')->unique();
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
        Schema::dropIfExists('tour_packages');
    }
};
