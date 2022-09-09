<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now= Carbon :: now()->toDateTimeString();

        Category::insert([

            ['name' => 'Bagues', 'slug' => 'bagues', 'created_at'=> $now, 'updated_at'=>$now],
            ['name' => 'Bracelets', 'slug' => 'bracelets', 'created_at'=> $now, 'updated_at'=>$now],
            ['name' => 'Chaînes', 'slug' => 'chaînes', 'created_at'=> $now, 'updated_at'=>$now],
            ['name' => 'Gourmettes', 'slug' => 'gourmettes', 'created_at'=> $now, 'updated_at'=>$now],
            ['name' => 'Ensembles', 'slug' => 'ensembles', 'created_at'=> $now, 'updated_at'=>$now],
            ['name' => 'Boucles', 'slug' => 'boucles', 'created_at'=> $now, 'updated_at'=>$now],
           
        ]);
    }
}
