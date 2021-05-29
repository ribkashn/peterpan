<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_trans');
            $table->string('plat_nomor');
            $table->string('nama_pelanggan');
            $table->time('jam_cuci');
            $table->date('tgl_cuci');
            $table->integer('rating');
            $table->integer('paket');
            $table->integer('status_cuci');
            $table->string('bukti_bayar');
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
        Schema::dropIfExists('transaksi');
    }
}
