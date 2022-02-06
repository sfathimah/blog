<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RulerelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Rule_relation::create([
			'symp_id' => 6,
			'cond_id' => 4,
			'cf_value' => 0.8
		]);
        App\Rule_relation::create([
			'symp_id' => 7,
			'cond_id' => 4,
			'cf_value' => 0.4
		]);App\Rule_relation::create([
			'symp_id' => 11,
			'cond_id' => 4,
			'cf_value' => 0.2
		]);App\Rule_relation::create([
			'symp_id' => 13,
			'cond_id' => 4,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 6,
			'cond_id' => 5,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 8,
			'cond_id' => 5,
			'cf_value' => 0.6
		]);App\Rule_relation::create([
			'symp_id' => 9,
			'cond_id' => 5,
			'cf_value' => 0.4
		]);App\Rule_relation::create([
			'symp_id' => 12,
			'cond_id' => 5,
			'cf_value' => 0.3
		]);App\Rule_relation::create([
			'symp_id' => 14,
			'cond_id' => 5,
			'cf_value' => 0.4
		]);App\Rule_relation::create([
			'symp_id' => 20,
			'cond_id' => 6,
			'cf_value' => 0.9
		]);
        App\Rule_relation::create([
			'symp_id' => 15,
			'cond_id' => 7,
			'cf_value' => 0.9
		]);
        App\Rule_relation::create([
			'symp_id' => 21,
			'cond_id' => 7,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 6,
			'cond_id' => 8,
			'cf_value' => 0.5
		]);App\Rule_relation::create([
			'symp_id' => 18,
			'cond_id' => 8,
			'cf_value' => 0.7
		]);App\Rule_relation::create([
			'symp_id' => 22,
			'cond_id' => 8,
			'cf_value' => 0.4
		]);App\Rule_relation::create([
			'symp_id' => 23,
			'cond_id' => 8,
			'cf_value' => 0.5
		]);App\Rule_relation::create([
			'symp_id' => 7,
			'cond_id' => 9,
			'cf_value' => 0.7
		]);App\Rule_relation::create([
			'symp_id' => 15,
			'cond_id' => 9,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 19,
			'cond_id' => 9,
			'cf_value' => 0.5
		]);App\Rule_relation::create([
			'symp_id' => 24,
			'cond_id' => 9,
			'cf_value' => 0.4
		]);App\Rule_relation::create([
			'symp_id' => 9,
			'cond_id' => 10,
			'cf_value' => 0.2
		]);
        App\Rule_relation::create([
			'symp_id' => 11,
			'cond_id' => 10,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 14,
			'cond_id' => 10,
			'cf_value' => 0.4
		]);App\Rule_relation::create([
			'symp_id' => 25,
			'cond_id' => 10,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 13,
			'cond_id' => 11,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 26,
			'cond_id' => 11,
			'cf_value' => 0.9
		]);App\Rule_relation::create([
			'symp_id' => 27,
			'cond_id' => 11,
			'cf_value' => 0.6
		]);App\Rule_relation::create([
			'symp_id' => 30,
			'cond_id' => 12,
			'cf_value' => 0.8
		]);App\Rule_relation::create([
			'symp_id' => 31,
			'cond_id' => 12,
			'cf_value' => 0.7
		]);App\Rule_relation::create([
			'symp_id' => 32,
			'cond_id' => 12,
			'cf_value' => 0.4
		]);App\Rule_relation::create([
			'symp_id' => 33,
			'cond_id' => 12,
			'cf_value' => 0.7
		]);
        App\Rule_relation::create([
			'symp_id' => 7,
			'cond_id' => 13,
			'cf_value' => 0.5
		]);App\Rule_relation::create([
			'symp_id' => 10,
			'cond_id' => 13,
			'cf_value' => 0.5
		]);App\Rule_relation::create([
			'symp_id' => 11,
			'cond_id' => 13,
			'cf_value' => 0.3
		]);App\Rule_relation::create([
			'symp_id' => 17,
			'cond_id' => 13,
			'cf_value' => 0.6
		]);App\Rule_relation::create([
			'symp_id' => 28,
			'cond_id' => 13,
			'cf_value' => 0.3
		]);App\Rule_relation::create([
			'symp_id' => 29,
			'cond_id' => 13,
			'cf_value' => 0.4
		]);
    }
}
