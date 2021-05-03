<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
           'name' => 'Victor Duarte',
           'email' => 'victor@victor.com',
           'password' => bcrypt('123123')
        ]);
    }
}
