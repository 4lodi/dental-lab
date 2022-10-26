<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_work', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clients', 255);
            $table->string('details', 255)->nullable();
            $table->bigInteger('work_id')->unsigned();
            $table->bigInteger('type_work_id')->unsigned();
            $table->bigInteger('medical_entity_id')->unsigned();
            $table->bigInteger('medical_center_id')->unsigned();
            $table->string('price', 255);
            $table->bigInteger('doctor_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->date('start_work');
            $table->date('finish_work');
            $table->time('time_work');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('work_id')->references('id')->on('work')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_work_id')->references('id')->on('works_price')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medical_entity_id')->references('id')->on('medical_entity')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medical_center_id')->references('id')->on('medical_center')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_work');
    }
}
