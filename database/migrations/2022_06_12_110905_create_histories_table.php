<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengunjung_id');
            $table->text('kepribadian_id');
            $table->text('poin');
            $table->text('karir');
            $table->date('tanggal');
            $table->string('hasil');
            $table->string('kelemahan');
            $table->string('kelebihan');
            $table->foreign('pengunjung_id')->references('id')->on('pengunjungs')->onDelete('cascade');
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
        Schema::dropIfExists('histories');
    }
}
