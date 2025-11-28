<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@fishnote.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'resident_id' => null,
        ]);

        $this->command->info('✅ Admin berhasil dibuat!');
        $this->command->info('📧 Email: admin@fishnote.com');
        $this->command->info('🔑 Password: admin123');
    }
}