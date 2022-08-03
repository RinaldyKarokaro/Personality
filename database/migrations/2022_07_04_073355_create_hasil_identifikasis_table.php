<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilIdentifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_identifikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengunjung_id');
            $table->text('identifikasi_id');
            $table->text('karir');
            $table->date('tanggal');
            $table->string('hasil');
            $table->text('kepribadian')->nullable();
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
        Schema::dropIfExists('hasil_identifikasis');
    }
}
