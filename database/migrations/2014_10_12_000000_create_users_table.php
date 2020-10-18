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
            $table->char('nip', 20);
            $table->string('nama_staff', 100);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->string('password', 45);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 100)->default('Bengkulu')->nullable();
            $table->string('no_hp', 15);
            $table->string('nidn', 8)->nullable();
            $table->char('id_unit_kerja', 10);
            $table->enum('hak_akses', ['dosen', 'staff', 'admin'])->default('dosen');
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
