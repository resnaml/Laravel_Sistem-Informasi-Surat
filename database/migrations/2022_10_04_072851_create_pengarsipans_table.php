<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengarsipansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengarsipans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('file_arsip');
            $table->string('author');
            $table->string('judul');
            $table->string('kodearsip')->autoIncrement();

            // Foregin ID
            $table->foreignId('kategori_arsip_id');
            // $table->foreignId('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengarsipans');
    }
}
