<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToPenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            $table->integer('harga_sewa_id')->unsigned()->change();
            $table->foreign('harga_sewa_id')->references('id')->on('harga_sewa');

            $table->integer('mobil_id')->unsigned()->change();
            $table->foreign('mobil_id')->references('id')->on('mobil');

            $table->integer('pelanggan_id')->unsigned()->change();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyewaan', function (Blueprint $table) {
            //
        });
    }
}
