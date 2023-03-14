<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSuratkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('suratkeluars', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('no_surat_keluar')->autoIncrement();
                $table->date('tgl_surat_keluar');
                $table->integer('lampiran')->nullable();
                $table->text('perihal', 255);
                $table->string('penerima_surat');
                $table->enum('status', ['Diterima', 'Proses', 'Ditolak'])->default('Proses');
                $table->boolean('disposisi_isi')->default(0);
                $table->boolean('print_surat')->default(0);
                
                // foreign key
                $table->foreignId('sifat_id');
                $table->foreignId('jenissurat_id');
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratkeluars');
    }
}
