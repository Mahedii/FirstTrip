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
        Schema::create('tender_infos', function (Blueprint $table) {
            $table->id('TENDER_INFO_ID');
            $table->string('TENDER_ID');
            $table->mediumText('DESCRIPTION')->nullable(true);
            $table->string('ORGANIZATION')->nullable(true);
            $table->double('AMOUNT')->nullable(true);
            $table->string('YEAR')->nullable(true);
            $table->string('PURCHASE_DEADLINE')->nullable(true);
            $table->string('TOTAL_PURCHASE_AMOUNT')->nullable(true);
            $table->string('TOTAL_ITEMS')->nullable(true);
            $table->string('PURCHASE_QUANTITY')->nullable(true);
            $table->string('PURCHASE_DUE_ITEMS')->nullable(true);
            $table->string('DELIVERY_ITEMS')->nullable(true);
            $table->string('ITEMS_DELIVERY_DUE')->nullable(true);
            

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
        Schema::dropIfExists('tender_infos');
    }
};
