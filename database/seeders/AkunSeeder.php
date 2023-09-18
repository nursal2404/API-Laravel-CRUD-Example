<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Akun::create([
            'id' => 1,
            'username' => 'pengguna1',
            'email' => 'pengguna1@example.com',
            'password' => bcrypt('katasandi1'),
        ]);

        Akun::create([
            'id' => 2,
            'username' => 'pengguna2',
            'email' => 'pengguna2@example.com',
            'password' => bcrypt('katasandi2'),
        ]);
    }
}
