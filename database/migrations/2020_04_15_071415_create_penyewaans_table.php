<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faktur', 100);
            $table->integer('mobil_id');
            $table->integer('pelanggan_id');
            $table->integer('harga_sewa_id');
            $table->date('tanggal_sewa');
            $table->integer('jumlah_mobil');
            $table->integer('lama_sewa');
            $table->date('tanggal_kembali_seharusnya');
            $table->integer('status_sewa');
            $table->date('tanggal_kembali');
            $table->double('denda');
            $table->double('subtotal');
            $table->double('total_harga');
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
        Schema::dropIfExists('penyewaan');
    }
}
