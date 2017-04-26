<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new App\Group();
        $group->name = "Fájl-kezelő feladatok";
        $group->save();

	    $group = new App\Group();
	    $group->name = "Könyvtár-kezelő feladatok";
	    $group->save();

	    $group = new App\Group();
	    $group->name = "Szűrős feladatok";
	    $group->save();

	    $group = new App\Group();
	    $group->name = "Felhasználó és csoportkezelő feladatok";
	    $group->save();

	    $group = new App\Group();
	    $group->name = "Folyamatkezelő feladatok";
	    $group->save();

	    $group = new App\Group();
	    $group->name = "Archiválás feladatok";
	    $group->save();

	    $group = new App\Group();
	    $group->name = "Ütemezés feladatok";
	    $group->save();
    }
}
