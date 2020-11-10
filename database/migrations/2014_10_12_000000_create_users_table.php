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
            $table->integer('id_user')->autoIncrement();
            $table->char('nip', 20);
            $table->string('nama', 100);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->string('password', 255);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 100)->default('Bengkulu')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('nidn', 32)->nullable();
            $table->char('id_unit_kerja', 10);
            $table->enum('hak_akses', ['dosen', 'staff', 'admin'])->default('dosen');
            $table->enum('input_surat', ['aktif', 'tidak'])->default('tidak');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
