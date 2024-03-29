<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip_kode');
            $table->string('nama_lengkap');
            $table->string('jabatan');
            $table->text('alamat');
            $table->string('telepon');
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('nips');
    }
}
