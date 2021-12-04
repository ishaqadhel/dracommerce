<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsCategoriesSeeder extends Seeder
{
    private $categories = [
        "Accessories", "Games", "Miniature"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        $i = 1;
        foreach($this->categories as $name) {
            $rows[] = [
                "name" => $name,
                "created_at" => Carbon::now(),            
            ];
            echo 'Create product category data: ' . $i . PHP_EOL;
            $i++;
        }

        $chunks = array_chunk($rows, 5);
        foreach($chunks as $chunk) {
            echo 'inserting chunk' . PHP_EOL;
            DB::table("products_categories")->insertOrIgnore($chunk);
        }
    }
}
