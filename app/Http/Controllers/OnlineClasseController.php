<?php

namespace App\Http\Controllers;

use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\OnlineClasse;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;


class OnlineClasseController extends Controller
{

    use MeetingZoomTrait;
    public function index()
    {
        $online_classes = OnlineClasse::where('created_by',auth()->user()->email)->get();
        return view('online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('online_classes.add', compact('Grades'));
    }

    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('online_classes.indirect', compact('Grades'));
    }


    public function store(Request $request)
    {

            $meeting = $this->createMeeting($request);

            OnlineClasse::create([
                'integration' => true,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            dd($meeting);


    }


    // public function storeIndirect(Request $request)
    // {
    //     try {
    //         OnlineClasse::create([
    //             'integration' => false,
    //             'Grade_id' => $request->Grade_id,
    //             'Classroom_id' => $request->Classroom_id,
    //             'section_id' => $request->section_id,
    //             'user_id' => auth()->user()->id,
    //             'meeting_id' => $request->meeting_id,
    //             'topic' => $request->topic,
    //             'start_at' => $request->start_time,
    //             'duration' => $request->duration,
    //             'password' => $request->password,
    //             'start_url' => $request->start_url,
    //             'join_url' => $request->join_url,
    //         ]);
    //         toastr()->success(trans('messages.success'));
    //         return redirect()->route('online_classes.index');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with(['error' => $e->getMessage()]);
    //     }
    // }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        try {

            $info = OnlineClasse::find($request->id);

            if ($info->integration == true) {
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
                // online_classe::where('meeting_id', $request->id)->delete();
                OnlineClasse::destroy($request->id);
            } else {
                // online_classe::where('meeting_id', $request->id)->delete();
                OnlineClasse::destroy($request->id);
            }

            toastr()->success(trans('messages.Delete'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
