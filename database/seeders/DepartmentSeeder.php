<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Department;
date_default_timezone_set('Asia/Kolkata');

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Department::truncate();

        $recordsMultiple = [
            [
                'title' => 'Telecaller',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'I.T.',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'Accounting',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'Food Service',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'XYZ',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'Manager',
                'is_active' => constants('is_active.active'),
            ],
        ];
        foreach ($recordsMultiple as $key => $value) {
            Department::create($value);
        }


    }




}
