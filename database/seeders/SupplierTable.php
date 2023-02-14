<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SupplierTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $datas = [
                ['supplier' => 'Supplier One', 'whole_seller' => 'Whole Seller One', 'steering_type' => 'Left Hand Driven (LHD)'],
                ['supplier' => 'Supplier Two', 'whole_seller' => 'Whole Seller Two', 'steering_type' => 'Right Hand Driven (RHD)'],
                ['supplier' => 'Supplier Three', 'whole_seller' => 'Whole Seller Three', 'steering_type' => ''],
            ];
        foreach ($datas as $data) {
            Supplier::create($data);
        }
    }
}
