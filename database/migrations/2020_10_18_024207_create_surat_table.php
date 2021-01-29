<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->integer('id_surat')->autoIncrement();
            $table->string('no_surat', 45);
            $table->text('tentang');
            $table->text('deskripsi_surat')->nullable();
            $table->enum('jenis_surat', ['Surat Keputusan', 'Surat Tugas']);
            $table->date('tanggal_surat');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->string('link_file', 200);
            $table->string('link_download', 200);
            $table->string('pejabat', 100)->nullable();
            $table->string('jabatan_pejabat', 45)->nullable();
            $table->char('nip', 20);
            $table->timestamps();
        });

        Schema::table('surat', function (Blueprint $table) {
            $table->foreign('nip')->references('nip')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat');
    }
}
