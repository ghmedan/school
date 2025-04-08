<?php

namespace App\Repository;

use App\Http\Requests\StoreStudentsRequest;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Classroom;

use App\Models\Gender;
use App\Models\Image;
use App\Models\Nationalities;
use App\Models\TypeBlood;
use App\Models\Sections;
use App\Models\students;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface
{
    public function create()
    {

        $data['my_classes'] = Grade::all();
        $data['parents'] = My_Parent::all();

        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalities::all();
        $data['bloods'] = TypeBlood::all();
        $data['students'] = students::all();

        // $Students =  students::findOrFail($id);
        return view('Students.add', $data);
    }









    public function Get_classrooms($id)
    {

        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }







    //Get Sections
    public function Get_Sections($id)
    {

        $list_sections = Sections::where("Class_id", $id)->pluck("Name_Section", "id");
        return $list_sections;
    }









    public function Store_Student($request)
    {
        DB::beginTransaction(); //تاكد الرفع اذا لم يوجد اخطاء 
        try {
            $students = new Students();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            //insert img
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('Attachment/Students/' . $students->name, $file->getClientOriginalName(), 'upload_attchments');

                    //insert image table

                    $images = new Image();
                    $images->filename = $name;
                    $images->imageable_id = $students->id;
                    $images->imageable_Type = 'App\Models\students';
                    $images->save();
                }
            }
            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect()->route('student_index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }












    public function student_edit($id)
    {

        $data['Grades'] = Grade::all();
        $data['parents'] = My_Parent::all();

        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalities::all();
        $data['bloods'] = TypeBlood::all();
        $data['students'] = students::all();

        $Students =  students::findOrFail($id);
        return view('Students.edit', $data, compact('Students'));
    }












    public function Students_update($request)
    {

        try {
            $Edit_Students = students::findOrFail($request->id);
            $Edit_Students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('student_index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }












    public function Students_destroy($request)
    {
        $students = students::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.success'));
        return redirect()->route('student_index');
    }


    public function student_show($id)
    {
        $Student = students::findOrFail($id);
        return view('Students.show', compact('Student'));
    }




    public function Upload_attachment($request)
    {
        foreach ($request->file('photos') as $file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('Attachment/Students/' . $request->student_name, $file->getClientOriginalName(), 'upload_attchments');

            //insert image table

            $images = new Image();
            $images->filename = $name;
            $images->imageable_id = $request->student_id;
            $images->imageable_Type = 'App\Models\students';
            $images->save();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('student_show', $request->student_id);
    }




    public function Download_attachment($name, $filename)
    {
        return response()->download(public_path('Attachment/Students/' . $name . '/' . $filename));
    }


    public function Delete_attachment($request)
    {
        // Delete img in Sserver disk
        Storage::Disk('upload_attchments')->delete('Attachments/Students/' . $request->student_name . '/' . $request->filename);

        // Delete in data
        image::where('id', $request->id)->where('filename', $request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('student_show', $request->student_id);
    }
}
