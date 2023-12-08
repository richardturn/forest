<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $forests = DB::table('Fires')
            ->select(
                'NWCG_REPORTING_AGENCY as agency' ,
                'USCAPNF as id',
                'NWCG_REPORTING_UNIT_NAME as name',
            )
            ->orderBy('NWCG_REPORTING_UNIT_NAME')
            ->distinct('NWCG_REPORTING_UNIT_NAME')
            ->paginate(15);

        return view('home')
            ->with('forests', $forests);
    }
}
