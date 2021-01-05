<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->boolean('kelola_akun');
            $table->boolean('kelola_barang');
            $table->boolean('transaksi');
            $table->boolean('kelola_laporan');
            $table->timestamps();
        });

        DB::table('access')->insert(
            array(
                'user' => 1,
                'kelola_akun' => 1,
                'kelola_barang' => 1,
                'transaksi' => 1,
                'kelola_laporan' => 1
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access');
    }
}
