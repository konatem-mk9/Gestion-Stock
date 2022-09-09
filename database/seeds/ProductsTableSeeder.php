<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Bague '.$i,
                'slug' => 'bague-'.$i,
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Bijoux '. $i . ' chez obiang de très bonne qualité, satisfaction au rendez-vous!',
               
            ])->categories()->attach(1);
        }

        $product= Product ::find(1);
        $product->categories()->attach(2);

        // Bracelet
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Bracelet ' . $i,
                'slug' => 'bracelet-' . $i,
                'details' => [24, 25, 27][array_rand([24, 25, 27])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32GB RAM',
                'price' => rand(249999, 449999),
                'description' =>'Bijoux '. $i . ' chez obiang de très bonne qualité, satisfaction au rendez-vous!',
             
            ])->categories()->attach(2);
        }

        // Chaînes
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Chaîne ' . $i,
                'slug' => 'chaîne-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [7, 8, 9][array_rand([7, 8, 9])] . ' inch screen, 4GHz Quad Core',
                'price' => rand(79999, 149999),
                'description' =>'Bijoux '. $i . ' chez obiang de très bonne qualité, satisfaction au rendez-vous!',
                
            ])->categories()->attach(3);
        }

        // Gourmettes
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Gourmette ' . $i,
                'slug' => 'gourmette-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [10, 11, 12][array_rand([10, 11, 12])] . ' inch screen, 4GHz Quad Core',
                'price' => rand(49999, 149999),
                'description' =>'Bijoux '. $i . ' chez obiang de très bonne qualité, satisfaction au rendez-vous!',
               
            ])->categories()->attach(4);
        }

        // Ensembles
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Ensemble ' . $i,
                'slug' => 'ensemble-' . $i,
                'details' => [46, 50, 60][array_rand([7, 8, 9])] . ' inch screen, Smart TV, 4K',
                'price' => rand(79999, 149999),
                'description' =>'Bijoux '. $i . ' chez obiang de très bonne qualité, satisfaction au rendez-vous!',
             
            ])->categories()->attach(5);
        }

        // Boucles
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Boucles d\'oreilles ' . $i,
                'slug' => 'boucle-' . $i,
                'details' => 'Full Frame DSLR, with 18-55mm kit lens.',
                'price' => rand(79999, 249999),
                'description' =>'Bijoux '. $i . ' chez obiang de très bonne qualité, satisfaction au rendez-vous!',
               
            ])->categories()->attach(6);
        }

        // // Appliances
        // for ($i = 1; $i <= 9; $i++) {
        //     Product::create([
        //         'name' => 'Appliance ' . $i,
        //         'slug' => 'appliance-' . $i,
        //         'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, dolorum!',
        //         'price' => rand(79999, 149999),
        //         'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
               
        //     ]);
        // }

        // Product::create([
        //     'name' => 'mcbk',
        //     'slug' => 'fh1',
        //     'details' => 'rfh',
        //     'price' => 652,
        //     'description' => 'fjjjjjjjjjjjjjjjj',
            
        // ]);

        // Product::create([
        //     'name' => 'fkkfl',
        //     'slug' => 'fh2',
        //     'details' => 'rfh',
        //     'price' => 652,
        //     'description' => 'fjjjjjjjjjjjjjjjj',
            
        // ]);

        // Product::create([
        //     'name' => 'ri',
        //     'slug' => 'fh3',
        //     'details' => 'rfh',
        //     'price' => 652,
        //     'description' => 'fjjjjjjjjjjjjjjjj',
            
        // ]);

        // Product::create([
        //     'name' => 'mgp',
        //     'slug' => 'fh4',
        //     'details' => 'rfh',
        //     'price' => 652,
        //     'description' => 'fjjjjjjjjjjjjjjjj',
            
        // ]);

        // Product::create([
        //     'name' => 'ropr',
        //     'slug' => 'fh5',
        //     'details' => 'rfh',
        //     'price' => 652,
        //     'description' => 'fjjjjjjjjjjjjjjjj',
            
        // ]);
    }
}
