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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id('PURCHASE_ORDER_ID');
            $table->integer('CUSTOMER_ID');
            $table->string('PO_NO')->unique();
            $table->string('PO_DATE');
            $table->string('REF_NO');
            $table->mediumText('INVOICE_ADDRESS');
            $table->mediumText('DELIVERY_ADDRESS');
            $table->double('VAT');
            $table->double('AIT');
            $table->string('NOTE');
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
        Schema::dropIfExists('purchase_orders');
    }
};
