<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Symptom::create([
			'name' => "Hard to chew"
		]);
        App\Symptom::create([
			'name' => "Swelling of the gums or redness"
		]);
        App\Symptom::create([
			'name' => "Swelling of the jaw"
		]);
        App\Symptom::create([
			'name' => "Fever"
		]);
        App\Symptom::create([
			'name' => "Pain or tenderness around the gums (when or without touch)"
		]);
        App\Symptom::create([
			'name' => "Gums or tooth fester"
		]);App\Symptom::create([
			'name' => "Swelling lymph nodes"
		]);
        App\Symptom::create([
			'name' => "Pain when opening the mouth"
		]);
        App\Symptom::create([
			'name' => "Tooth ache or throb"
		]);App\Symptom::create([
			'name' => "More sensitive teeth"
		]);
        App\Symptom::create([
			'name' => "Gums bleed easily"
		]);
        App\Symptom::create([
			'name' => "Sores or pockets between the teeth and gums"
		]);App\Symptom::create([
			'name' => "Sensitive to sweetness"
		]);
        App\Symptom::create([
			'name' => "The circular form of gum"            
		]);
        App\Symptom::create([
			'name' => "Do not grow all or some teeth, both milk teeth and permanent
            teeth"
		]);App\Symptom::create([
			'name' => "Tooth shape looked eroded"
		]);
        App\Symptom::create([
			'name' => "Earache"
		]);
        App\Symptom::create([
			'name' => "Insomnia or feel uneasy"
		]);App\Symptom::create([
			'name' => "Consistency gums soft"
		]);
        App\Symptom::create([
			'name' => "Swollen cheeks"
		]);
        App\Symptom::create([
			'name' => "White or brownish stain on tooth surfaces"
		]);App\Symptom::create([
			'name' => "Rough tooth surfaces"
		]);
        App\Symptom::create([
			'name' => "Teeth look longer than normal"
		]);
        App\Symptom::create([
			'name' => "Tooth wobbly"
		]);App\Symptom::create([
			'name' => "There are cracks in the teeth"
		]);
        App\Symptom::create([
			'name' => "Existence teeth broken"
		]);
        App\Symptom::create([
			'name' => "Cold, sweet, or wry typically causes pain"
		]);
        App\Symptom::create([
			'name' => "There are hole on the surface of the tooth"
		]);
    }
}
