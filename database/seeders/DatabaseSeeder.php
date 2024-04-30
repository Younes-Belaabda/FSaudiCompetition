<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Presence;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'ادمين']);
        Role::create(['name' => 'مشرف']);

        $user = User::create([
            'name' => 'يزيد بن ناصر',
            'email' => 'admin@mail.com',
            'password' => bcrypt(123456),
        ]);

        $user->assignRole('ادمين');

    }
}




