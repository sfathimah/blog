<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Condition::create([
			'name' => "Abscess Periodontal"
		]);
        App\Condition::create([
			'name' => "Abscess Periapical"
		]);
        App\Condition::create([
			'name' => "Anodontia"
		]);
        App\Condition::create([
			'name' => "Tooth Abrasion"
		]);
        App\Condition::create([
			'name' => "Bruxism"
		]);
        App\Condition::create([
			'name' => "Gingivitis"
		]);
        App\Condition::create([
			'name' => "Gums Purulent"
		]);
        App\Condition::create([
			'name' => "Tooth Perforated"
		]);
        App\Condition::create([
			'name' => "Fractured Tooth"
		]);
        App\Condition::create([
			'name' => "Periodontitis"
		]);
    }
}
