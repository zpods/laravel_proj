<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Psy\CodeCleaner\UseStatementPass;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        \App\Models\Category::factory()->count(7)->create()->each(function($c) {
            $c->products()->saveMany(\App\Models\Product::factory()->count(12)->make());
        });
        \App\Models\User::factory()->count(1)->create();
        
    }
      
}
