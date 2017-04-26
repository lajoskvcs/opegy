<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lali = new App\User();
        $lali->name = "Kovács Lajos";
        $lali->email = "kovacs.lajos1218@gmail.com";
        $lali->neptun = "M6X07X";
        $lali->level = 2;
        $lali->password = bcrypt("asd123");
        $lali->save();
    }
}
