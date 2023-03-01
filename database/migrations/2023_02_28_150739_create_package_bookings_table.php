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
        Schema::create('package_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('NAME');
            $table->string('CONTACT_NO');
            $table->string('EMAIL');
            $table->string('START_DATE');
            $table->string('END_DATE')->nullable(true);
            $table->string('TOTAL_PAX');
            $table->string('TOTAL_ADULT');
            $table->string('TOTAL_CHILD');
            $table->string('TOTAL_INFANT');
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
        Schema::dropIfExists('package_bookings');
    }
};
