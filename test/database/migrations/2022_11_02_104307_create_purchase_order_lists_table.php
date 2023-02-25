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
        Schema::create('purchase_order_lists', function (Blueprint $table) {
            $table->id('PURCHASE_ORDER_LIST_ID');
            $table->string('PO_NO');
            $table->string('SL');
            $table->string('ITEM_CODE')->nullable(true);
            $table->string('UNIT');
            $table->double('UNIT_PRICE');
            $table->integer('QUANTITY');
            $table->string('DELIVERY_DATE');
            $table->mediumText('PRODUCT_DESCRIPTION')->nullable(true);
            
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
        Schema::dropIfExists('purchase_order_lists');
    }
};
