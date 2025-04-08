<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeachers;

use App\Repository\TeacherRepository;

use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }




    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        //$Teachers = Teacher::all();
        return view('Teachers.Teachers', compact('Teachers'));
    }



    public function create()
    {
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('Teachers.create', compact('specializations', 'genders'));
    }



    public function store(StoreTeachers $request)
    {
        return $this->Teacher->StoreTeachers($request);
    }


    public function show(Teacher $teacher)
    {
        //
    }

    public function edit( $id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();

        return view('Teachers.edit', compact('Teachers', 'specializations', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
