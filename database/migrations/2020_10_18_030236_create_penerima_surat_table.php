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
            $table->integer('id_user');
            $table->integer('id_surat')->autoIncrement(false);
        });

        Schema::table('penerima_surat', function (Blueprint $table) {
            $table->primary(['id_user', 'id_surat']);

            $table->foreign('id_user')->references('id_user')->on('users')
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
