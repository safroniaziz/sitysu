<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatUnitKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_unit_kerja', function (Blueprint $table) {
            $table->integer('id_user', 20);
            $table->char('id_unit_kerja', 10);
            $table->date('tanggal_berakhir')->nullable();
            $table->char('nip_pengubah', 20);
            $table->enum('status', ['aktif', 'tidak'])->default('aktif');
            $table->timestamps();
        });

        Schema::table('riwayat_unit_kerja', function (Blueprint $table) {
            // $table->primary('id_unit_kerja');

            $table->foreign('id_user')->references('id_user')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_unit_kerja')->references('id_unit_kerja')->on('unit_kerja')
                ->onDelete('no action')
                ->onUpdate('no action');

            // $table->foreign('nip_pengubah')->references('nip')->on('users')
            //     ->onDelete('no action')
            //     ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_unit_kerja');
    }
}
