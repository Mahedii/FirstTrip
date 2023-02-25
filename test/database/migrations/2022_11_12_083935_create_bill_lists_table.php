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
        Schema::create('bill_lists', function (Blueprint $table) {
            $table->id('BILL_LIST_ID');
            $table->unsignedBigInteger('PURCHASE_ORDER_LIST_ID');
            $table->foreign('PURCHASE_ORDER_LIST_ID')->references('PURCHASE_ORDER_LIST_ID')->on('purchase_order_lists')->onDelete('cascade');
            $table->string('STATUS')->nullable(true);

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
        Schema::dropIfExists('bill_lists');
    }
};
