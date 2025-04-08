<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public $subjects;

    public function __construct(SubjectRepositoryInterface $subjects)
    {
        $this->subjects = $subjects;
    }



    public function index()
    {
        return $this->subjects->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->subjects->create();
    }





    public function store(Request $request)
    {
        return $this->subjects->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

   


    public function edit($id)
    {
        return $this->subjects->edit($id);
    }

   


    public function update(Request $request)
    {
       return $this->subjects->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->subjects->destroy($request);
    }
}
