<?php


namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Repository\AttendaceRepositoryInterface;
use Illuminate\Http\Request;

class AttendaceController extends Controller
{
    protected $Attendaces;
    public function __construct(AttendaceRepositoryInterface $Attendaces)
    {
        $this->Attendaces = $Attendaces;
    }


    public function index()
    {
        return $this->Attendaces->index();
    }




    public function create()
    {
        //
    }




    public function store(Request $request)
    {
        return $this->Attendaces->store($request);
    }



    public function show($id)
    {
        return $this->Attendaces->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendace $attendace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendace $attendace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendace $attendace)
    {
        //
    }
}
