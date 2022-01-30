<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Statement;
use App\User;
use App\Statement_data;

class StatementController extends Controller
{
    public function index()
    {
        $patients = User::select('id', 'name')
        ->where('user_type','User')
        ->get();

        return view('statement.index', compact('patients'));
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
        $d[]= array ('presc_id'=>$data[$i]['presc_id'],
                        'qty'=>$data[$i]['qty'],
                        'remark'=>$data[$i]['remark']);
        }
        Statement_data::create($d);
   
        return redirect()->route('statement.index')
                        ->with('success','Prescription statement saved successfully.');
    }
}