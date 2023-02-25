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
        Schema::create('to_do_task_assigned_tos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('TASK_ID');
            $table->foreign('TASK_ID')->references('id')->on('to_do_tasks')->onDelete('cascade');
            $table->integer('ASSIGNED_USER_ID');
            
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
        Schema::dropIfExists('to_do_task_assigned_tos');
    }
};
