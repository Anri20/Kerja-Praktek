<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->unsignedBigInteger('iddatas')->autoIncrement();
            $table->date('date');
            $table->time('time');
            $table->double('temp_out', 3, 1);
            $table->double('hi_temp', 3, 1);
            $table->double('low_temp', 3, 1);
            $table->integer('out_hum');
            $table->double('dew_point', 3, 1);
            $table->double('wind_speed', 3, 1);
            $table->enum('wind_dir', ['E', 'S', 'W', 'N'])->nullable();
            $table->double('wind_run', 4, 2);
            $table->double('hi_speed', 3, 1);
            $table->enum('hi_dir', ['E', 'S', 'W', 'N'])->nullable();
            $table->double('wind_chill', 3, 1);
            $table->double('heat_index', 3, 1);
            $table->double('THW_index', 3, 1);
            $table->double('THSW_index', 3, 1)->nullable();
            $table->double('bar', 5, 1);
            $table->double('rain', 4, 2);
            $table->double('rain_rate', 3, 1);
            $table->double('solar_rad', 5, 1);
            $table->double('solar_energy', 4, 2);
            $table->double('hi_solar_rad', 5, 1);
            $table->double('heat_d-d', 5, 3);
            $table->double('cool_d-d', 5, 3);
            $table->double('in_temp', 3, 1);
            $table->integer('in_hum');
            $table->double('in_dew', 3, 1);
            $table->double('in_heat', 3, 1);
            $table->double('in_EMC', 4, 2);
            $table->double('in_air_density', 5, 3);
            $table->double('temp_2nd', 5, 3)->nullable();
            $table->double('temp_3rd', 5, 3)->nullable();
            $table->double('hum_2rd', 5, 3)->nullable();
            $table->double('hum_3rd', 5, 3)->nullable();
            $table->double('ET', 4, 2);
            $table->integer('wind_samp');
            $table->integer('wind_tx');
            $table->double('ISS_recept', 4, 1);
            $table->integer('arc_int');
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
        Schema::dropIfExists('datas');
    }
}
