<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Sections;
use App\Models\Teacher;
use App\Http\Requests\StoreSections;
use Illuminate\Console\View\Components\Secret;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $teachers = Teacher::findOrFail(2);

        // return $teachers->Sections;
        $grades = Grade::with(['section'])->get();
        $list_Grades = Grade::all();
        $cla = Classroom::all();

        $teachers = Teacher::all();
        //  return($grades);


        return view('Sections.Sections', compact('grades', 'list_Grades', 'teachers', 'cla'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSections $request)
    {
        try {
            $validated = $request->validated();

            $sections = new Sections();
            $sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $sections->Grade_id = $request->Grade_id;
            $sections->Class_id = $request->Class_id;
            $sections->Status = 1;
            $sections->save();
            $sections->teachers()->attach($request->teacher_id); //attach => تستخدم في العلاقات متعدد الى متعدد 

            toastr()->success(trans('messages.success'));

            return redirect()->route('section_index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function edit(Sections $sections)
    {
        //
    }



    public function update(StoreSections $request)
    {
        try {
            $validated = $request->validated();


            $sections = Sections::findOrFail($request->id);
            $sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $sections->Grade_id = $request->Grade_id;
            $sections->Class_id = $request->Class_id;
            if (isset($request->Status)) {
                $sections->Status = 1;
            } else {
                $sections->Status = 2;
            }


            // update pivot tABLE
            if (isset($request->teacher_id)) {
                $sections->teachers()->sync($request->teacher_id); //sync=>تقوم بالتاكد من ان البيانات المراد اضافتها موجوده ام لا لو موجودة مايظيف وان كانت غير موجودة يقوم باضافتها اي عدم تكرار البيانات
            } else {
                $sections->teachers()->sync(array());
            }



            $sections->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('section');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $sections = Sections::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('section');
    }

    ///تجلب اسماء الصفوف مع المراحل الدراسية من كود اجاكس 
    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

        return $list_classes;
    }
}
