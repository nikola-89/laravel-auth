<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Faker\Generator as Faker;

class TagsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @param Faker $faker
	 * @return void
	 */
    public function run(Faker $faker)
    {
		for ($i=0; $i < 5; $i++) {
			$newtag = new Tag;
			$newtag->name = $faker->word;
			$newtag->save();
		}
    }
}
