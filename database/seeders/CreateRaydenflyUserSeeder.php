<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateRaydenflyUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'raydenfly84@gmail.com'],
            [
                'name' => 'Raydenfly',
                'email' => 'raydenfly84@gmail.com',
                'password' => Hash::make('dahlah_-'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
