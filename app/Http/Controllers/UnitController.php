<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function show(Unit $unit): View
    {
        return view('unit.show')
            ->with('unit', $unit);
    }
}
