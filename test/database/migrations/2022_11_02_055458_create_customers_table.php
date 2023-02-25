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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('CUSTOMER_ID');
            $table->string('CUSTOMER_NAME');
            $table->string('EMAIL')->nullable(true);
            $table->string('PHONE')->nullable(true);
            $table->string('MOBILE')->nullable(true);
            $table->string('GST_NUMBER')->nullable(true);
            $table->string('TAX_NUMBER')->nullable(true);
            $table->integer('PREVIOUS_DUE')->nullable(true);
            $table->mediumText('OFFICE_ADDRESS')->nullable(true);
            $table->mediumText('SHIPPING_ADDRESS')->nullable(true);
            $table->string('SLUG')->unique();
            $table->integer('SORT_ORDER')->nullable(true);
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
        Schema::dropIfExists('customers');
    }
};
