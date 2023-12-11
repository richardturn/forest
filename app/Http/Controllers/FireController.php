<?php

namespace App\Http\Controllers;

use App\Models\Fire;
use Illuminate\View\View;

class FireController extends Controller
{
    public function show(string $name): View
    {
        $fires = Fire::where('NWCG_REPORTING_UNIT_NAME', $name)->paginate(15);

        return view('forest.show')
            ->with('fires', $fires);
    }
}
