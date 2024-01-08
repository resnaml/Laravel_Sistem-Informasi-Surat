<?php

use App\Models\Nip;
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
            $table->string('username');
            $table->string('email');
            $table->bigInteger('nip')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_kepala')->default(false);
            $table->rememberToken();

            $table->foreignId('nip_id')->nullable()->constrained('nips')->onDelete('cascade');

            

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
