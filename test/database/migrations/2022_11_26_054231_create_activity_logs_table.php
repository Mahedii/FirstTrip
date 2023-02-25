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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('USER_ID')->nullable(true);
            $table->string('USER_NAME')->nullable(true);
            $table->text('ACTION')->nullable(true);
            $table->string('CARD_COLOR')->nullable(true);
            $table->integer('FAVOURITE')->default(0);

            $table->integer('SORT_ORDER')->nullable(true);
            
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
        Schema::dropIfExists('activity_logs');
    }
};
