<?php
  
namespace App\Http\Controllers;
  
use App\Symptommmm;
use App\Condition;
use App\Prescription;
use App\Rule_relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $symptoms = Symptom::latest()->paginate(5);
        $conditions = Condition::latest()->paginate(5);
        $prescriptions = Prescription::latest()->paginate(5);
        // $rule_relations = Rule_relation::latest()->paginate(5);
  
        return view('symptoms.index',compact('symptoms','conditions','prescriptions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    public function create_symp()
    {
        return view('symptoms.create_symp');
    }

    public function create_cond()
    {
        return view('symptoms.create_cond');
    }

    public function create_presc()
    {
        return view('symptoms.create_presc');
    }

    public function create_rule_rel(Condition $condition)
    {
        return view('symptoms.create_rule_rel',compact('condition'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    public function store_symp(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
  
        Symptom::create($request->all());
   
        return redirect()->route('symptoms.index')
                        ->with('success','Symptom created successfully.');
    }

    public function store_cond(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
  
        Condition::create($request->all());
   
        return redirect()->route('symptoms.index')
                        ->with('success','Medical Condition created successfully.');
    }

    public function store_presc(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
  
        Prescription::create($request->all());
   
        return redirect()->route('symptoms.index')
                        ->with('success','Treatment/ Prescription created successfully.');
    }

    public function store_rule_rel(Request $request)
    {
        $request->validate([
            'cond_id' => 'required',
            'symp_id' => 'required',
            'cf_value' => 'required'
        ]);
  
        Rule_relation::create($request->all());
   
        return redirect()->route('symptoms.index')
                        ->with('success','Related Symptom & CF added successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function edit_symp(Symptom $symptom)
    {
        return view('symptoms.edit_symp',compact('symptom'));
    }
    
    public function edit_cond(Condition $condition)
    {
        return view('symptoms.edit_cond',compact('condition'));
    }

    public function edit_presc(Prescription $prescription)
    {
        return view('symptoms.edit_presc',compact('prescription'));
    }

    public function manage_rule_rel(Condition $condition)
    {
        // $rule_relations = Rule_relation::latest()->paginate(5);

    //     SELECT colors.color, shapes.shape
    //    FROM colors
    //    JOIN shapes
    //         ON colors.id = shapes.color_id;

            $rule_relations = DB::table('rule_relations')
            ->join('symptoms', 'rule_relations.symp_id', '=', 'symptoms.id')
            ->select('rule_relations.*', 'symptoms.name as symp_name')
            ->get();

        // $rule_relations = Rule_relation::with('symptoms')->get();

        // foreach ($results as $rule_record) {
        //   echo $rule_record->id; //access table2 data
        //   echo $rule_record->symptoms->name; //access table1 data
        // }

        return view('symptoms.manage_rule_rel',compact('condition','rule_relations'));
    }

    public function edit_rule_rel(Rule_relation $rule_rel)
    {
        return view('symptoms.edit_rule_rel',compact('rule_rel'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    public function update_symp(Request $request, Symptom $symptom)
    {
        $request->validate([
            'name' => 'required'
        ]);
        // Page::whereId('1')->update([
        //     'name' => $request['name'],
        //     'email' => $request['email'],            
        //     // 'password' => Hash::make($data['password']),
        //     // 'role_id' => $request['role'],
        //     'icno' => $request['icno'],
        //     'phone' => $request['phone'],
        //     'address' => $request['address'],
        //     'gender' => $request['gender'],
        //     'dob' => $request['dob']
        // ]);

        $symptom->update($request->all());
  
        return redirect()->route('symptoms.index')
                        ->with('success','Symptom updated successfully');
    }

    public function update_presc(Request $request, Prescription $prescription)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $prescription->update($request->all());
  
        return redirect()->route('symptoms.index')
                        ->with('success','Treatment/ Prescription updated successfully');
    }
    
    public function update_cond(Request $request, Condition $condition)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $condition->update($request->all());
  
        return redirect()->route('symptoms.index')
                        ->with('success','Medical Condition updated successfully');
    }

    public function update_rule_rel(Request $request, Rule_relation $rule_rel)
    {
        $request->validate([
            'symp_id' => 'required',
            'cf_value' => 'required'
        ]);

        $rule_rel->update($request->all());
  
        return redirect()->route('symptoms.index')
                        ->with('success','Related Symptom updated successfully');
    }


  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

    public function destroy_symp(Symptom $symptom)
    {
        $symptom->delete();
  
        return redirect()->route('symptoms.index')
                        ->with('success','Symptom deleted successfully');
    }

    public function destroy_cond(Condition $condition)
    {
        $condition->delete();
  
        return redirect()->route('symptoms.index')
                        ->with('success','Medical Condition deleted successfully');
    }

    public function destroy_presc(Prescription $prescription)
    {
        $prescription->delete();
  
        return redirect()->route('symptoms.index')
                        ->with('success','Treatment/ Prescription deleted successfully');
    }

    public function destroy_rule_rel(Rule_relation $rule_rel)
    {
        $rule_rel->delete();
  
        return redirect()->route('symptoms.index')
                        ->with('success','Related Symptom deleted successfully');
    }
}