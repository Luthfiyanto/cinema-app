<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Movie extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Pirates of the Carribean'
            ],
            [
                'title' => 'Clash of the Titans'
            ],
            [
                'title' => 'Forgetting Sarah Marshal'
            ],
            [
                'title' => "Daddy's Little Girl"
            ]
        ];

        foreach ($data as $d) {
            Movies::create($d);
        }
    }
}
