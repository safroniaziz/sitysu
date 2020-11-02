<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->char('id_unit_kerja', 10);
            $table->string('nama_departemen', 45)->default('Fakultas Teknik');

            $table->timestamps();
        });

        Schema::table('unit_kerja', function (Blueprint $table) {
            $table->primary('id_unit_kerja');
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
        Schema::dropIfExists('unit_kerja');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
