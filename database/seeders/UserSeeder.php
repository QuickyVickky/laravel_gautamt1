<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'password'    => bcrypt('password'),
            'name'   => 'Super Admin',
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'type' => constants('user_type.Admin'),
        ]);


    }




}
