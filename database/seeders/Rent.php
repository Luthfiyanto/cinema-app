<?php

namespace Database\Seeders;

use App\Models\Rent as ModelsRent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'movie_id' => 1
            ],
            [
                'user_id' => 1,
                'movie_id' => 2
            ],
            [
                'user_id' => 2,
                'movie_id' => 3
            ],
            [
                'user_id' => 2,
                'movie_id' => 4
            ],
            [
                'user_id' => 3,
                'movie_id' => 1
            ],
        ];

        foreach ($data as $d) {
            ModelsRent::create($d);
        }
    }
}
