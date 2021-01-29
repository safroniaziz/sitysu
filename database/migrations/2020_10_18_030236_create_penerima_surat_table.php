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
        });

        Schema::table('penerima_surat', function (Blueprint $table) {
            $table->primary(['nip', 'id_surat']);

            $table->foreign('nip')->references('nip')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_surat')->references('id_surat')->on('surat')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
