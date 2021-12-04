<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTypesSeeder extends Seeder
{
    private $payments = [
        "OVO", "GOPAY", "BANK TRANSFER"
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
        foreach($this->payments as $name) {
            $rows[] = [
                "name" => $name,
                "created_at" => Carbon::now(),            
            ];
            echo 'Create payment data: ' . $i . PHP_EOL;
            $i++;
        }

        $chunks = array_chunk($rows, 5);
        foreach($chunks as $chunk) {
            echo 'inserting chunk' . PHP_EOL;
            DB::table("payments_types")->insertOrIgnore($chunk);
        }
    }
}
