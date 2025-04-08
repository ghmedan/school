<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Repository\StudentRepositoryInterface;
use App\Repository\StudentRepository;
use App\Http\Requests\StoreStudentsRequest;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $Students;
    public function __construct(StudentRepositoryInterface $Students)
    {
        $this->Students = $Students;
    }

    public function index()
    {
        $students = students::all();
        return view('Students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Students->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        return $this->Students->Store_Student($request);
    }




    public function show($id)
    {
        return $this->Students->student_show($id);
    }




    public function edit($id)
    {
        return $this->Students->student_edit($id);
    }




    public function update(StoreStudentsRequest $request)
    {
        return $this->Students->Students_update($request);
    }



    public function destroy(Request $request)
    {
        return $this->Students->Students_destroy($request);
    }


    public function Get_classrooms($id)
    {
        return $this->Students->Get_classrooms($id);
    }


    public function Get_Sections($id)
    {
        return $this->Students->Get_Sections($id);
    }

    public function upload(Request $request)
    {
        return $this->Students->Upload_attachment($request);
    }



    public function Download_attachment($name , $filename)
    {
        return $this->Students->Download_attachment($name,$filename);

    }




    public function Delete_attachment(Request $request)
    {
        return $this->Students->Delete_attachment($request);
    }
    
    
}
