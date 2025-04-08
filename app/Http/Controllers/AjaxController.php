<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Sections;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    // Get Classrooms
    public function Get_classrooms($id)
    {
        return Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
    }

    //Get Sections
    public function Get_Sections($id)
    {

        return Sections::where("Class_id", $id)->pluck("Name_Section", "id");
    }
}
