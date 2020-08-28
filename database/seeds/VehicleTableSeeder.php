<?php

use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
        	'vehicle_type' => 'Car',
        	'vehicle_model' => 'Civic Type R',
        	'vehicle_plate' => 'KentongCloudUno'
        ]);

        DB::table('vehicles')->insert([
        	'vehicle_type' => 'Car',
        	'vehicle_model' => 'Lancer',
        	'vehicle_plate' => 'KentongCloudDos'
        ]);

        DB::table('vehicles')->insert([
        	'vehicle_type' => 'Car',
        	'vehicle_model' => 'Raptor',
        	'vehicle_plate' => 'KentongCloudTres'
        ]);
    }
}
