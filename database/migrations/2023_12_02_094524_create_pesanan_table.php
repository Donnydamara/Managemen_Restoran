<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan');
            $table->integer('id_user');
            $table->string('no_pesanan', 255);
            $table->string('jenis_pembayaran')->nullable();
            $table->string('jenis_pesanan')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('tbl_pesanan');
    }
}
