<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Statement;
use App\User;
use App\Statement_data;
use App\Prescription;
use App\Bookedmeeting;


class StatementController extends Controller
{
    public function index()
    {
        $patients = User::select('id', 'name')
        ->where('user_type','User')
        ->get();

        $prescs = Prescription::select('id', 'name')
        ->get();

        // date_default_timezone_set("Asia/Kuala_Lumpur");
        // echo date_default_timezone_get();

        return view('statement.index', compact('patients','prescs'));
    }

    public function index_int($meetingid, $patientid)
    {
        $patient = User::select('id', 'name')
        ->whereId($patientid)
        ->first();

        $prescs = Prescription::select('id', 'name')
        ->get();

        $this->debug_to_console($patient);

        return view('statement.index_int', compact('prescs','meetingid','patient'));
    }

    public function statement_history()
    {
        $statements = DB::table('statements')
        ->where('patient_id', auth()->user()->id)
        ->join('users', 'users.id', '=', 'statements.dentist_id')
            ->select('statements.*', 'users.name as dentist_name')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('statement.history', compact('statements'));
    }

    public function dentist_statement_history()
    {
        $statements = DB::table('statements')
        ->where('dentist_id', auth()->user()->id)
        ->join('users', 'users.id', '=', 'statements.patient_id')
            ->select('statements.*', 'users.name as patient_name')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('statement.dentist_history', compact('statements'));
    }

    function debug_to_console($data, $context = 'Debug in Console') {

        // Buffering to solve problems frameworks, like header() in this and not a solid return.
        ob_start();
    
        $output  = 'console.info(\'' . $context . ':\');';
        $output .= 'console.log(' . json_encode($data) . ');';
        $output  = sprintf('<script>%s</script>', $output);
    
        echo $output;
    }

    public function store_statement(Request $request)
    {
        $request->validate([
            'dentist_id' => 'required',
            'patient_id' => 'required',
            'date' => 'required',
            'presc_id' => 'required',
            'qty' => 'required',
            'remark' => 'required',
        ]);

        $statement = $request->only('dentist_id','patient_id','patient_name','date');
        $data = $request->only('item_id','presc_id','qty','remark');

        $new = Statement::create($statement);

        $latest_id = $new->id;

        $d = [];
        for($i=0;$i<count($data['item_id']);$i++)
        {
        $d[]= array ('statement_id'=>$latest_id,
                        'presc_id'=>$data['presc_id'][$i],
                        'qty'=>$data['qty'][$i],
                        'remark'=>$data['remark'][$i]);
        Statement_data::create($d[$i]);
        }
        
        return redirect()->route('statement.index')
                        ->with('success','Prescription statement saved successfully.');
    }

    public function store_statement_int(Request $request, $patientid, $meetingid)
    {
        $request->validate([
            'dentist_id' => 'required',
            'patient_id' => 'required',
            'date' => 'required',
            'presc_id' => 'required',
            'qty' => 'required',
            'remark' => 'required',
        ]);

        $statement = $request->only('dentist_id','patient_id','patient_name','date');
        $data = $request->only('item_id','presc_id','qty','remark');

        $new = Statement::create($statement);

        $latest_id = $new->id;

        $d = [];
        for($i=0;$i<count($data['item_id']);$i++)
        {
        $d[]= array ('statement_id'=>$latest_id,
                        'presc_id'=>$data['presc_id'][$i],
                        'qty'=>$data['qty'][$i],
                        'remark'=>$data['remark'][$i]);
        Statement_data::create($d[$i]);
        }

        Bookedmeeting::where('id', $meetingid)->update(['statement_id' => $latest_id, 'status' => "Completed"]);
        
        return redirect()->route('pages.meeting.updatestatus')
                        ->with('success','Prescription statement saved successfully.');
    }

    public function view_data_modal($id)
    {
    	// $sdata = Statement_data::select('presc_id', 'qty', 'remark')
        // ->where('statement_id',$id)
        // ->get();

        $sdata = DB::table('statement_datas')
            ->where('statement_id',$id)
            ->join('prescriptions', 'statement_datas.presc_id', '=', 'prescriptions.id')
            ->select('statement_datas.*', 'prescriptions.name as presc_name')
            ->get();

	    return response()->json([
	      'data' => $sdata
	    ]);
    }
}
