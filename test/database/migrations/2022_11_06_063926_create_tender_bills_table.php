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
        Schema::create('tender_bills', function (Blueprint $table) {
            $table->id('TENDER_BILL_ID');
            $table->string('SL');
            $table->string('COMPANY_NAME')->nullable(true);
            $table->string('DATE')->nullable(true);
            $table->string('CHEQUE_NO')->nullable(true);
            $table->double('AMOUNT')->nullable(true);
            $table->string('TENDER_ID')->nullable(true);

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
        Schema::dropIfExists('tender_bills');
    }
};
