<?php
  
namespace App\Http\Controllers;
  
use App\Symptom;
use App\Condition;
use App\Prescription;
use App\Rule_relation;
use App\Cond_presc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Rule_relController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_cond_presc(Condition $condition)
    {
        // $conditions = Condition::latest()->paginate(5);
        // $prescriptions = Prescription::latest()->paginate(5);
        // $rule_relations = Rule_relation::latest()->paginate(5);
  
        $cond_prescs = DB::table('cond_prescs')
        ->join('prescriptions', 'cond_prescs.presc_id', '=', 'prescriptions.id')
        ->select('cond_prescs.*', 'prescriptions.name as presc_name')
        ->get();

        return view('rule_rels.manage_cond_presc',compact('condition','cond_prescs'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ;
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create_cond_presc(Condition $condition)
    {
        $prescs = Prescription::orderBy('name')
                                ->get();

        return view('rule_rels.create_cond_presc',compact('condition','prescs'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_cond_presc(Request $request, Condition $condition)
    {
        $request->validate([
            'cond_id' => 'required',
            'presc_id' => 'required',
            'cf_value' => 'required'
        ]);
  
        Cond_presc::create($request->all());
   
        return redirect()->route('rule_rels.manage_cond_presc', $condition)
                        ->with('success','Related Treatment/ Prescription & CF added successfully.');
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function edit_cond_presc(Condition $condition, Cond_presc $cond_presc)
    {
        $prescs = Prescription::orderBy('name')
                                ->get();

        return view('rule_rels.edit_cond_presc',compact('cond_presc', 'condition','prescs'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update_cond_presc(Request $request, Cond_presc $cond_presc, Condition $condition)
    {
        $request->validate([
            'presc_id' => 'required',
            'cf_value' => 'required'
        ]);

        $cond_presc->update($request->all());
  
        return redirect()->route('rule_rels.manage_cond_presc', $condition)
                        ->with('success','Related Treatment/ Prescription updated successfully');
    }


  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy_cond_presc(Condition $condition, Cond_presc $cond_presc)
    {
        $cond_presc->delete();
  
        return redirect()->route('rule_rels.manage_cond_presc', $condition)
                        ->with('success','Related Symptom deleted successfully');
    }
}