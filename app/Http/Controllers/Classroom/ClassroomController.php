<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\StoreClassroom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $classes = Classroom::all();
    $grade = Grade::all();
    return view('classrooms.class_room', compact('grade', 'classes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreClassroom $request)
  {
    $List_Classes = $request->List_Classes; // توجد هذه المصفوفه قبل فورم الاضافة وياتي الركوست منها
    try {
      $validated = $request->validated();
      foreach ($List_Classes as $list_class) { //الغرض من الدواره اضافة اكثر من صف في نفس الوقت
        $class = new Classroom();
        $class->Name_Class = ['en' => $list_class['Name_class_en'], 'ar' => $list_class['Name_class_ar']];
        $class->Grade_Id = $list_class['Grade_id'];
        $class->save();
      }
      toastr()->success(trans('messages.success'));
      return redirect()->route('class');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    try {
      $class = Classroom::findOrFail($request->id);
      $class->update([
        $class->Name_Class = ['ar' => $request->Name_class_ar, 'en' => $request->Name_class_en],
        $class->Grade_Id = $request->Grade_id,

      ]);
      toastr()->success(trans('messages.Update'));
      return redirect()->route('class');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    try {
      $class = Classroom::findOrFail($request->id)->delete();
      toastr()->success(trans('messages.Delete'));

      return redirect()->route('class');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }




  public function delete_all(Request $request)
  {
    $delete_all_id = explode(",", $request->delete_all_id);

    Classroom::whereIn('id', $delete_all_id)->Delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('class');
  }

  public function filter_classes(Request $request)
  {
    $grade = Grade::all();
    $Search = Classroom::select('*')->where('Grade_Id', '=', $request->Grade_id)->get();
    return view('classrooms.class_room', compact('grade'))->withDetails($Search);
  }
}
