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
            $table->string('judul');
            $table->integer('kodearsip');

            // Foregin ID
            $table->foreignId('kategori_arsip_id')->constrained('kategoriarsips')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('arsip_user')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
