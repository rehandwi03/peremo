<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supir', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_supir', 50);
            $table->string('nik', 35);
            $table->string('jenis_kelamin', 15);
            $table->text('alamat');
            $table->string('foto_supir');
            $table->string('status_supir', 2);
            $table->string('no_telp_supir', 15);
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
        Schema::dropIfExists('supirs');
    }
}
