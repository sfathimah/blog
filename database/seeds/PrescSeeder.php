<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PrescSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Prescription::create([
			'name' => "Presc 1"
		]);
        App\Prescription::create([
			'name' => "Presc 2"
		]);
        App\Prescription::create([
			'name' => "Presc 3"
		]);
    }
}
