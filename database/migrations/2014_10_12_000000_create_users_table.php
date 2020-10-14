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
            $table->string('nama');
            $table->char('nip_nidn', 18);
            $table->string('password');
            $table->enum('role', ['dosen', 'staf', 'admin']);
            $table->enum('jk', ['l', 'p'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('foto_profil')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
