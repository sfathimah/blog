<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Statement;
use App\User;
use App\Statement_data;
use App\Prescription;

class StatementController extends Controller
{
    public function index()
    {
        $patients = User::select('id', 'name')
        ->where('user_type','User')
        ->get();

        $prescs = Prescription::select('id', 'name')
        ->get();

        return view('statement.index', compact('patients','prescs'));
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

        Statement::create($statement);

        $d = [];
        for($i=0;$i<count($data['item_id']);$i++)
        {
        $d[]= array ('presc_id'=>$data['presc_id'][$i],
                        'qty'=>$data['qty'][$i],
                        'remark'=>$data['remark'][$i]);
        Statement_data::create($d[$i]);
        }
        
        return redirect()->route('statement.index')
                        ->with('success','Prescription statement saved successfully.');
    }
}
