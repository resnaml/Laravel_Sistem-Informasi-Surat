<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('nip')->unique();
            $table->string('password');
            $table->string('jabatan');
            $table->enum('level',['Kepala','Karyawan']);
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
