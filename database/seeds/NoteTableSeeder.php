<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Note;
class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = Category::all();
    	$notes = factory(Note::class)->times(100)->make();
    	foreach ($notes as $note) {
    		$categories->random()->notes()->save($note);
    	}
    }
}
