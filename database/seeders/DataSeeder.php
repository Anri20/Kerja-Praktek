<?php

namespace Database\Seeders;

use App\Models\Data;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(public_path('csv/datas.csv'), 'r');

        $firstline = true;
        $secondline = true;
        while (($data = fgetcsv($csvFile, 2000, ';')) !== FALSE) {
            if (!$firstline) {
                if (!$secondline) {
                    // dd($data);
                    DB::table('datas')->insert([
                        'date' => DateTime::createFromFormat('d/m/Y', $data[1])->format('Y-m-d'),
                        'time' => $data[2],
                        'temp_out' => ($data[3] == '---')? null : $data[3],
                        'hi_temp' => ($data[4] == '---')? null : $data[4],
                        'low_temp' => ($data[5] == '---')? null : $data[5],
                        'out_hum' => ($data[6] == '---')? null : $data[6],
                        'dew_point' => ($data[7] == '---')? null : $data[7],
                        'wind_speed' => $data[8],
                        'wind_dir' => ($data[9] != 'E' || $data[9] != 'S' || $data[9] != 'W' || $data[9] != 'N')? null : $data[9],
                        'wind_run' => $data[10],
                        'hi_speed' => $data[11],
                        'hi_dir' => ($data[12] != 'E' || $data[12] != 'S' || $data[12] != 'W' || $data[12] != 'N')? null : $data[12],
                        'wind_chill' => ($data[13] == '---')? null : $data[13],
                        'heat_index' => ($data[14] == '---')? null : $data[14],
                        'THW_index' => ($data[15] == '---')? null : $data[15],
                        'THSW_index' => ($data[16] == '---')? null : $data[16],
                        'bar' => ($data[17] == '------')? null : $data[17],
                        'rain' => $data[18],
                        'rain_rate' => $data[19],
                        'solar_rad' => ($data[20] == '---')? null : $data[20],
                        'solar_energy' => ($data[21] == '---')? null : $data[21],
                        'hi_solar_rad' => ($data[22] == '---')? null : $data[22],
                        'heat_d-d' => ($data[23] == '---')? null : $data[23],
                        'cool_d-d' => ($data[24] == '---')? null : $data[24],
                        'in_temp' => ($data[25] == '---')? null : $data[25],
                        'in_hum' => ($data[26] == '---')? null : $data[26],
                        'in_dew' => ($data[27] == '---')? null : $data[27],
                        'in_heat' => ($data[28] == '---')? null : $data[28],
                        'in_EMC' => ($data[29] == '---')? null : $data[29],
                        'in_air_density' => ($data[30] == '---')? null : $data[30],
                        'temp_2nd' => ($data[31] == '---')? null : $data[31],
                        'temp_3rd' => ($data[32] == '---')? null : $data[32],
                        'hum_2nd' => ($data[33] == '---')? null : $data[33],
                        'hum_3rd' => ($data[34] == '---')? null : $data[34],
                        'ET' => $data[35],
                        'wind_samp' => $data[36],
                        'wind_tx' => $data[37],
                        'ISS_recept' => $data[38],
                        'arc_int' => $data[39],
                    ]);
                }
                $secondline = false;
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
