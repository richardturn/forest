<?php

namespace App\Http\Controllers;

use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return view('unit.show')
            ->with('unit', $unit);
    }
}
