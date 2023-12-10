<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

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
                'NWCG_REPORTING_AGENCY as agency',
                'NWCG_REPORTING_UNIT_ID as id',
                'NWCG_REPORTING_UNIT_NAME as name',
            )
            ->orderBy('NWCG_REPORTING_UNIT_NAME')
            ->distinct('NWCG_REPORTING_UNIT_NAME')
            ->paginate(15);

        return view('home')
            ->with('forests', $forests);
    }

    public function nativePHP(Request $request)
    {
        $location = database_path('forest.sqlite');
        $myPDO = new PDO("sqlite:$location");

        $page = $request->page ?? 1;

        $skip = (10 * $page) - 10;

        $forests = $myPDO->query("SELECT  NWCG_REPORTING_AGENCY as agency, NWCG_REPORTING_UNIT_ID as id , 
            NWCG_REPORTING_UNIT_NAME as name
            FROM Fires order by NWCG_REPORTING_UNIT_NAME LIMIT 10 OFFSET $skip");

        return view('home_native')
            ->with('forests', $forests);
    }
}
