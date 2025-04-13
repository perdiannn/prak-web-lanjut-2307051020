<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'id' => 1,
                'nama' => 'Ferdian',
                'npm' => '2307051020',
                'nama_kelas' => A,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'Fuad Abdul',
                'npm' => '2307051021',
                'nama_kelas' => B,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'Rizky Hidayat',
                'npm' => '2307051031',
                'nama_kelas' => C,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama' => 'Ragnar',
                'npm' => '2007058499',
                'nama_kelas' => A,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
