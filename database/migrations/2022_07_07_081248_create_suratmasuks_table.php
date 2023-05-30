<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
                $table->string('no_surat_keluar')->nullable();
                $table->date('tgl_surat_keluar')->nullable();
                $table->integer('lampiran')->nullable();
                $table->text('perihal', 255)->nullable();
                $table->string('penerima_surat')->nullable();
                $table->enum('status', ['Diterima', 'Proses', 'Ditolak'])->default('Proses');
                
                
                // foreign id
                $table->foreignId('sifat_id')->nullable();
                $table->foreignId('jenissurat_id')->nullable();
                $table->foreignId('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratmasuks');
    }
}
