<?php


namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Classroom;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades = Grade::all();
    return view('grades.grades')->with('grades', $Grades);
  }



  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrades $request)
  {

    try {
      $validated = $request->validated();
      $Grades = new Grade();
      $Grades->Name = ["en" => $request->Name_en, "ar" => $request->Name];
      $Grades->Notes = $request->Notes;
      
      $Grades->save();

      toastr()->success(trans('messages.success'));

      return redirect()->route('grade');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreGrades $request)
  {
    try {
      $validated = $request->validated();
      $Grades = Grade::findOrFail($request->id);
      $Grades->update([
        $Grades->Name = ["en" => $request->Name_en, "ar" => $request->Name],
        $Grades->Notes = $request->Notes,

      ]);
      toastr()->success(trans('messages.Update'));

      return redirect()->route('grade');
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
    $myclass_id = Classroom::where('Grade_id', $request->id)->pluck('Grade_id');
    if ($myclass_id->count() == 0) { //عدم حذف المراحل الدراسية الا في حالة اذا لم يوجد داخلها اي صف دراسي

      $Grades = Grade::findOrFail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('grade');
    } else {
      toastr()->error(trans('Grades_trans.delete_grade_Error'));
      return redirect()->route('grade');
    }
  }
}
