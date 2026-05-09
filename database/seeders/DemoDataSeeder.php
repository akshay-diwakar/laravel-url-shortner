<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;
use App\Models\ShortUrl;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Companies
        $company1 = Company::create([
            'name' => 'Tech Corp'
        ]);

        $company2 = Company::create([
            'name' => 'Info Solutions'
        ]);

        // Admin Users
        $admin1 = User::create([
            'name' => 'Admin One',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'company_id' => $company1->id
        ]);

        $admin2 = User::create([
            'name' => 'Admin Two',
            'email' => 'admin2@example.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'company_id' => $company2->id
        ]);

        // Member Users
        $member1 = User::create([
            'name' => 'Member One',
            'email' => 'member1@example.com',
            'password' => bcrypt('password'),
            'role' => 'Member',
            'company_id' => $company1->id
        ]);

        $member2 = User::create([
            'name' => 'Member Two',
            'email' => 'member2@example.com',
            'password' => bcrypt('password'),
            'role' => 'Member',
            'company_id' => $company2->id
        ]);

        User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
            'role' => 'Manager',
            'company_id' => $company1->id
        ]);

        User::create([
            'name' => 'Sales User',
            'email' => 'sales@example.com',
            'password' => bcrypt('password'),
            'role' => 'Sales',
            'company_id' => $company1->id
        ]);

        // Short URLs
        ShortUrl::create([
            'original_url' => 'https://google.com',
            'short_code' => 'goo123',
            'created_by' => $admin1->id,
            'company_id' => $company1->id
        ]);

        ShortUrl::create([
            'original_url' => 'https://github.com',
            'short_code' => 'git123',
            'created_by' => $member1->id,
            'company_id' => $company1->id
        ]);

        ShortUrl::create([
            'original_url' => 'https://laravel.com',
            'short_code' => 'lar123',
            'created_by' => $admin2->id,
            'company_id' => $company2->id
        ]);
    }
}