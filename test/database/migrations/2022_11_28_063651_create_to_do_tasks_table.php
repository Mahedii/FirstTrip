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
        Schema::create('to_do_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PROJECT_ID');
            $table->foreign('PROJECT_ID')->references('id')->on('to_do_projects')->onDelete('cascade');
            $table->string('TASK_NAME');
            $table->text('TASK_DESCRIPTION')->nullable(true);
            $table->string('STATUS')->nullable(true);
            $table->string('PRIORITY')->nullable(true);
            $table->string('DUE_DATE')->nullable(true);
            
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
        Schema::dropIfExists('to_do_tasks');
    }
};
