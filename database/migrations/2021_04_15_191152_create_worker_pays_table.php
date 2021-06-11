<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_pays', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('you_payd');
            $table->date('payd_from_date');
            $table->date('payd_till_date');
            $table->integer('user_id');
            $table->integer('worker_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_pays');
    }
}