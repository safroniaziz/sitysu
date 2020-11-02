<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima_surat', function (Blueprint $table) {
            $table->char('nip', 20);
            $table->integer('id_surat')->autoIncrement(false);

            $table->primary(['nip', 'id_surat']);
        });

        Schema::table('penerima_surat', function (Blueprint $table) {
            $table->foreign('nip')->references('nip')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_surat')->references('id_surat')->on('surat')
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
        Schema::dropIfExists('penerima_surat');
    }
}