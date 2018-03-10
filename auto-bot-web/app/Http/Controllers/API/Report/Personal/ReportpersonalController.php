<?php

namespace App\Http\Controllers\API\Report\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal\Reportpersonal;

class ReportpersonalController extends Controller
{
    public function __construct(Request $request, Reportpersonal $reportpersonal)
    {
        $this->request = $request;
        $this->reportpersonal = $reportpersonal;
    }

    public function getPersonalreport($id)
    {
        $report = $this->reportpersonal
                    ->where('users_id', $id)->paginate(10);
        return response()->json( ['status' => 'success', 'data' => $report] );
    }
}
