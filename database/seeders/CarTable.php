<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the cars
        $cars = [
            [
                'model' => 'Model One',
                'sFX' => 'A1',
                'variant' => 'SomeCar_1',
                'color' => 'Black',
                'supplier_id' => 1,
            ],
            [
                'model' => 'Model One',
                'sFX' => 'B1',
                'variant' => 'SomeCar_2',
                'color' => 'White',
                'supplier_id' => 1,
            ],
            [
                'model' => 'Model Two',
                'sFX' => 'A1',
                'variant' => 'SomeCar_1',
                'color' => 'Blue',
                'supplier_id' => 2,
            ],
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }

    }
}
