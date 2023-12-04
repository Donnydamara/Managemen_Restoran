<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detail_pesanan', function (Blueprint $table) {
            $table->bigIncrements('id_detail_pesanan');
            $table->integer('id_pesanan');
            $table->integer('id_menu');
            $table->string('nama_menu');
            $table->integer('jumlah');
            $table->decimal('harga');
            $table->decimal('subtotal');
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
        Schema::dropIfExists('tbl_detail_pesanan');
    }
}
