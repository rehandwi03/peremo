<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merek_id')->length(10);
            $table->string('varian', 35);
            $table->integer('tahun_keluaran');
            $table->string('kode_mobil', 35);
            $table->string('plat_nomor', 20);
            $table->double('harga_mobil');
            $table->string('foto_mobil');
            $table->integer('jumlah_unit');
            $table->integer('unit_tersedia');
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
        Schema::dropIfExists('mobil');
    }
}
