<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use App\Models\Category;
use App\Models\Company;
use App\Models\Contraindications;
use App\Models\medications;

use App\Models\Prescription;
use App\Models\prescription_medication;
use App\Models\shapes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class PrescriptionsController extends Controller
{

    public function index()
    {

        $prescriptions= Prescription::all();
        $medications= medications::all();

        return view('dashboard.prescriptions.index', compact('prescriptions','medications'));
    }

    public function create()
    {
        $categories=Category::all();
        $contraindications=Contraindications::all();
        $companies=Company::all();
        $shapes=shapes::all();
        $medications=medications::all();
        return view('dashboard.prescriptions.create',compact('categories','contraindications','companies','medications','shapes'));
    }

    public function loadCategories(Request $request)
    {
        $data=[];
        $category = Category::findOrfail($request->category_id);

        foreach ($category->medications as $medication)
            $data[]=$medication->medication_name;


        return json_encode($data);

    }

    public function store(Request $request)
    {
        $List_Classes = $request->List_Classes;
        $prescription= Prescription::create([
            'doctor_id' => auth('admin') -> user() -> id,
            'customer_address' => $request->customer_address,
            'customer_age' => $request->customer_age,
            'customer_mobile' => $request->customer_mobile,
            'customer_name' => $request->customer_name,
        ]);


        foreach ($List_Classes as $List_Class) {

            $My_Classes = new prescription_medication();
            $My_Classes->medications_id = $List_Class['medication_id'] ;
            $My_Classes->prescription_id=$prescription->id;
            $My_Classes->instruction_to_customer = $List_Class['content'] ;
            $My_Classes->save();

        }


        return redirect()->route('admin.prescriptions')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {

        $Prescription = Prescription::find($id);
        $categories=Category::all();
        $contraindications=Contraindications::all();
        $companies=Company::all();
        $shapes=shapes::all();
        $medications=medications::all();
        if (!$Prescription)
            return redirect()->route('admin.prescriptions')->with(['error' => 'هذا المانع غير موجود ']);

        return view('dashboard.prescriptions.edit',compact('categories','contraindications','companies','medications','shapes'));

    }
    public function update($id, Request $request)
    {
        try {

            //update DB
            $medication = medications::find($id);
            if (!$medication)
                return redirect()->route('admin.prescriptions')->with(['error' => 'هذا الدواء غير موجود']);
            DB::beginTransaction();

            $medication->medication_name = $request->medication_name? $request->medication_name: $medication->medication_name;
            $medication->medication_cost = $request->medication_cost? $request->medication_cost: $medication->medication_cost;
            $medication->commercial_name = $request->commercial_name? $request->commercial_name: $medication->commercial_name;
            $medication->category_id = $request->category_id? $request->category_id: $medication->category_id;
            $medication->company_id = $request->company_id? $request->company_id: $medication->company_id;
            $medication->contraindication_id = $request->contraindication_id? $request->contraindication_id: $medication->contraindication_id;

            $medication->save();
            DB::commit();
            return redirect()->route('admin.prescriptions')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.prescriptions')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $Prescription = Prescription::find($id);


            $Prescription->delete();

            return redirect()->route('admin.prescriptions')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.prescriptions')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
