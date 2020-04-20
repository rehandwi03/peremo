<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToDetailMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_mobil', function (Blueprint $table) {
            $table->integer('mobil_id')->unsigned()->change();
            $table->foreign('mobil_id')->references('id')->on('mobil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_mobil', function (Blueprint $table) {
            //
        });
    }
}
