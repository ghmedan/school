<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalities;
use App\Models\Sections;
use App\Models\Students;
use App\Models\TypeBlood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Students();
        $students->name = ['ar' => ' غمدان علي', 'en' => 'ghamdan Ali'];
        $students->email = '2021.ghamdanali@gmail.com';
        $students->password = Hash::make('123456789');
        $students->gender_id = 1;
        $students->nationalitie_id = Nationalities::all()->unique()->random()->id;
        $students->blood_id =TypeBlood::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Sections::all()->unique()->random()->id;
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}
