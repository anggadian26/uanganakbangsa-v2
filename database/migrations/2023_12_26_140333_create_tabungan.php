<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabungan', function (Blueprint $table) {
            $table->id('tabungan_id');
            $table->foreignId('user_id');
            $table->enum('jenis', ['M', 'K']);
            $table->decimal('penarikan', 20, 0)->nullable();
            $table->decimal('pemasukkan', 20, 0)->nullable();
            $table->date('tanggal');
            $table->decimal('jumlah_sisa', 20, 0);
            $table->text('keterangan')->nullable();
            $table->foreignId('record_id');
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
        Schema::dropIfExists('tabungan');
    }
};
