<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\promotion;
use App\Models\students;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{


    protected $promotion;
    public function __construct(StudentPromotionRepositoryInterface $promotion)
    {
        $this->promotion = $promotion;
    }


    public function index()
    {
        return $this->promotion->index();
    }


    public function create()
    {
        return $this->promotion->create();
    }




    public function store(Request $request)
    {
        return $this->promotion->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->promotion->destroy($request);
    }
}
