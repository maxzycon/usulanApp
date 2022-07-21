<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pengusulan::factory(100000)->create();


//
//         \App\Models\User::create([
//             'id' => 'A5EB03E240F7F6A0E040640A040252AD',
//             'name' => 'Pusat',
//             'email' => 'pusat@example.com',
//             'password' => Hash::make("pusat123"),
//             'level' => 1
//         ]);
//
//         $satker_id = [
//             "A5EB03E24341F6A0E040640A040252AD",
//             "A5EB03E24342F6A0E040640A040252AD",
//             "A5EB03E24343F6A0E040640A040252AD",
//             "A5EB03E24344F6A0E040640A040252AD",
//             "A5EB03E24345F6A0E040640A040252AD",
//             "A5EB03E24346F6A0E040640A040252AD",
//             "A5EB03E24347F6A0E040640A040252AD",
//             "A5EB03E24348F6A0E040640A040252AD",
//             "A5EB03E24349F6A0E040640A040252AD",
//             "A5EB03E2433EF6A0E040640A040252AD",
//             "A5EB03E2433FF6A0E040640A040252AD",
//             "A5EB03E24340F6A0E040640A040252AD",
//             "ff80808147e770b20147f7a9be4876b2",
//             "ff80808147e76ffd0147f7cd95973a6b",
//         ];
//
//         foreach ($satker_id as $key => $row){
//             \App\Models\User::factory()->create([
//                 'id' => $row,
//                 'name' => "Satker ". $key+1,
//                 'email' => "satker". $key+1 ."@example.com",
//                 'password' => Hash::make("satker123"),
//                 'level' => 2
//             ]);
//         }
    }
}
