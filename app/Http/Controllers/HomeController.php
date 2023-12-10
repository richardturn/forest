<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PDO;

class HomeController extends Controller
{
    public function index(): View
    {
        $forests = DB::table('Fires')
            ->select(
                'NWCG_REPORTING_AGENCY as agency',
                'NWCG_REPORTING_UNIT_ID as id',
                'NWCG_REPORTING_UNIT_NAME as name',
                DB::raw('COUNT(*) as total_fires')

            )
            ->orderBy('NWCG_REPORTING_UNIT_NAME')
            ->groupBy(['NWCG_REPORTING_AGENCY', 'NWCG_REPORTING_UNIT_ID', 'NWCG_REPORTING_UNIT_NAME'])
            ->distinct('NWCG_REPORTING_UNIT_NAME')
            ->paginate(15);

        return view('home')
            ->with('forests', $forests);
    }

    public function nativePHP(Request $request): View
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
