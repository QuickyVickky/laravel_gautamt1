<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Designation;
date_default_timezone_set('Asia/Kolkata');

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Designation::truncate();

        $recordsMultiple = [
            [
                'title' => 'Laravel Developer',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'Web Designer',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'HR',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'Flutter Developer',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'Graphics Designer',
                'is_active' => constants('is_active.active'),
            ],
            [
                'title' => 'Android Developer',
                'is_active' => constants('is_active.active'),
            ],
        ];
        foreach ($recordsMultiple as $key => $value) {
            Designation::create($value);
        }
        


    }




}
