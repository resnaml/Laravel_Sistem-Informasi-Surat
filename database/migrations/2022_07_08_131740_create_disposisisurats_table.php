<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisisuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisisurats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no_disposisi')->nullable();
            $table->string('disposisi_oleh')->nullable();
            $table->text('isi_ditolak')->nullable();
            
            // foreign id
            $table->foreignId('disposisi_id')->constrained('suratkeluars')->onDelete('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisisurats');
    }
}
