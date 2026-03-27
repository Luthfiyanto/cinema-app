<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'first_name' => "Janet",
                'last_name' => "Jones",
                'salutation' => "Ms",
                'address' => "1st Street Plot No 4"
            ],
            [
                'first_name' => "Robert",
                'last_name' => "Phil",
                'salutation' => "Mr",
                'address' => "3rd Street 34"
            ],
            [
                'first_name' => "Robert",
                'last_name' => "Phil",
                'salutation' => "Mr",
                'address' => "5th Avenue"
            ]
        ];

        foreach ($data as $d) {
            Users::create($d);
        }
    }
}
