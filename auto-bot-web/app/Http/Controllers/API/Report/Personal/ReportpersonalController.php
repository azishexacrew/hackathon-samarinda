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

    public function Index()
    {
        return Reportpersonal::with('user', 'tps')->get();
    }

    /**
     * @return Reportpersonal
     */
    public function personal($id)
    {
        return Reportpersonal::with('user', 'tps')->where('users_id', $id)->get();
    }

    public function store(Request $request)
    {
//        $report = Reportpersonal::create($request->all());
        $report = new Reportpersonal;

        $report->tps_id = $this->request->tps_id;
        $report->users_id = $this->request->users_id;
        $report->qty = $this->request->qty;
        $report->jenis = $this->request->jenis;
        $report->time = $this->request->time;
        $report->date = $this->request->date;

        $report->save();

        if ($report)
        {
            return response()->json(['status' => 'success', 'input', 'data' => $report]);
        }
    }

    public function update(Request $request, $id)
    {
        $report = $this->reportpersonal::findOrFail($id);
        $report->update($request->all());

        return response()->json(['status' => 'success', 'update','data' => $report]);
    }

    public function destroy($id)
    {
        $report = $this->reportpersonal::findOrFail($id);
        $report->delete();

        return '';
    }

    public function getPersonalreport($id)
    {
        $report = $this->reportpersonal
                    ->where('users_id', $id)->paginate(10);
        return response()->json( ['status' => 'success', 'data' => $report] );
    }
}
