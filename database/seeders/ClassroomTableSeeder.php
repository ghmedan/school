<?php

namespace Database\Seeders;


use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{

    public function run()
    { 
            DB::table('classrooms')->delete();
            $classrooms = [
                ['en' => 'First grade', 'ar' => 'الصف الاول'],
                ['en' => 'Second grade', 'ar' => 'الصف الثاني'],
                ['en' => 'Third grade', 'ar' => 'الصف الثالث'],
                
            ];
        // $grades = [
        //     0 =>
        //     ['en' => 'First grade', 'ar' => 'الصف الاول'],
        //     1 =>
        //     ['en' => 'Second grade', 'ar' => 'الصف الثاني'],
        //     2 =>
        //     ['en' => 'Third grade', 'ar' => 'الصف الثالث'],

        // ];

            foreach ($classrooms as $classroom) {
                Classroom::create([
                    'Name_Class' => $classroom,
                    'Grade_id' => Grade::orderBy('id', 'DESC')->get()->unique()->random()->id
                ]);
            }
        }
}
