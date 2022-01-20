<?php

namespace App\Http\Controllers;

use App\Rule_relation;
use App\Cond_presc;
use App\Symptom;
use App\Condition;
use App\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('diagnosis.index');
    }

    public function sympList_json()
   {
       $symptoms = Symptom::select('id', 'name')
       ->get();

        return json_encode($symptoms);
   }

   public function condList_json()
   {
       $conditions = Condition::select('id', 'name')
       ->get();

        return json_encode($conditions);
   }

   public function prescList_json()
   {
       $prescriptions = Prescription::select('id', 'name')
       ->get();

        return json_encode($prescriptions);
   }

   private function calc_cf(Object $itemcf, int $a){

        if($a <= 0){
            return $itemcf[0];
        }
        else{
            return $itemcf[$a] + $this->calc_cf($itemcf, $a-1)*(1-$itemcf[$a]);
        }

    }

    private function put_cf(Object $coll){

        $new = $coll->map(function ($item, $key) {
            
            $item2 = $item->flatten()->pluck('cf_value');
            $cond_cf = $this->calc_cf($item2, $item2->count()-1);
            return $item->put('cf', $cond_cf);
            
        });

        return $new;
    }

   public function cond_suggest(Request $request)
   {
        // $request->validate([
        //     'id' => 'required'
        // ]);
            // $symptoms = $request->input('sel_symp.0');

        $sel_symp = $request->input('sel_symp');

        // select relations where symptom id = selected symptoms
        $relations = Rule_relation::select('cond_id', 'cf_value')
        // $relations = Rule_relation::select('id', 'symp_id', 'cond_id', 'cf_value')
        ->whereIn('symp_id', $sel_symp)
        ->get();

        // group relations by condition id
        $rel_grouped = $relations->groupBy('cond_id');
        $new = collect($rel_grouped);

        // calc and put cf value for each condition
        $cf = $this->put_cf($new);

        $names = $this->getCondName($cf);
        
        return $names;
        // return $sorted[0][0]['cond_id']; NI BETOL
   }

   private function getCondName(Object $conds){
        $sorted = $conds->sortByDesc('cf');
        $sorted = $sorted->values()->all();
        $sorted = collect($sorted);

        $names = $sorted->map(function ($item, $key) {

            $cond_id = $item[0]['cond_id'];
            $cond_name = Condition::select('name')
            ->where('id', $cond_id)
            ->get();

            return [$cond_name->flatten()->pluck('name'), $item['cf']];
            
        });

        // $names =$names->flatten();
        return $names;
   }

   public function presc_suggest(Request $request)
   {

        $sel_cond = $request->input('sel_cond');

        // select relations where cond id = selected conds
        $relations = Cond_presc::select('presc_id', 'cf_value')
        ->whereIn('cond_id', $sel_cond)
        ->get();

        // group relations by presc id
        $rel_grouped = $relations->groupBy('presc_id');
        $new = collect($rel_grouped);

        // calc and put cf value for each presccription
        $cf = $this->put_cf($new);

        $names = $this->getPrescName($cf);
        
        return $names;
   }

   private function getPrescName(Object $prescs){
        $sorted = $prescs->sortByDesc('cf');
        $sorted = $sorted->values()->all();
        $sorted = collect($sorted);

        $names = $sorted->map(function ($item, $key) {

            $presc_id = $item[0]['presc_id'];
            $presc_name = Prescription::select('name')
            ->where('id', $presc_id)
            ->get();

            return [$presc_name->flatten()->pluck('name'), $item['cf']];
            
        });

        return $names;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
