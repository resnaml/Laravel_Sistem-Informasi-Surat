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
                $table->integer('no_surat_keluar');
                $table->date('tgl_surat_keluar');
                // $table->integer('lampiran')->nullable();
                $table->text('perihal', 255);
                $table->enum('status', ['Diterima', 'Proses', 'Ditolak'])->default('Proses');
                $table->boolean('disposisi_isi')->default(0);
                $table->boolean('print_surat')->default(0);
                $table->string('full_number');
                
                // foreign key
                $table->foreignId('sifat_id')->constrained('sifatsurats')->onDelete('cascade');
                $table->foreignId('jenissurat_id')->constrained('jenissurats')->onDelete('cascade');
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('kepada')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
