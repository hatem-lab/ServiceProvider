<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use App\Models\Category;
use App\Models\Company;
use App\Models\Contraindications;
use App\Models\medications;

use Illuminate\Http\Request;
use DB;

class MedicationsController extends Controller
{

    public function index()
    {

        $medications= medications::all();
        return view('dashboard.medications.index', compact('medications'));
    }

    public function create()
    {
        $categories=Category::all();
        $contraindications=Contraindications::all();
        $companies=Company::all();

        return view('dashboard.medications.create',compact('categories','contraindications','companies'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        $medication= new medications();
        $medication->medication_name=$request->medication_name;
        $medication->medication_cost=$request->medication_cost;
        $medication->commercial_name=$request->commercial_name;
        $medication->category_id=$request->category_id;
        $medication->company_id=$request->company_id;
        $medication->contraindication_id=$request->contraindication_id;

        $medication->save();
        DB::commit();
        return redirect()->route('admin.medications')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {
        $medication = medications::find($id);
        $categories=Category::all();
        $contraindications=Contraindications::all();
        $companies=Company::all();
        if (!$medication)
            return redirect()->route('admin.medications')->with(['error' => 'هذا المانع غير موجود ']);

        return view('dashboard.medications.edit', compact('medication','categories','contraindications','companies'));

    }
    public function update($id, Request $request)
    {
        try {

            //update DB
            $medication = medications::find($id);
            if (!$medication)
                return redirect()->route('admin.medications')->with(['error' => 'هذا الدواء غير موجود']);
            DB::beginTransaction();

            $medication->medication_name = $request->medication_name? $request->medication_name: $medication->medication_name;
            $medication->medication_cost = $request->medication_cost? $request->medication_cost: $medication->medication_cost;
            $medication->commercial_name = $request->commercial_name? $request->commercial_name: $medication->commercial_name;
            $medication->category_id = $request->category_id? $request->category_id: $medication->category_id;
            $medication->company_id = $request->company_id? $request->company_id: $medication->company_id;
            $medication->contraindication_id = $request->contraindication_id? $request->contraindication_id: $medication->contraindication_id;

            $medication->save();
            DB::commit();
            return redirect()->route('admin.medications')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.medications')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $medication = medications::find($id);

            if (!$medication)
                return redirect()->route('admin.medications')->with(['error' => 'هذا الدواء غير موجود ']);
            if ($medication->category)
                return redirect()->route('admin.medications')->with(['error' => 'هذا الدواء لا يمكن حذفه لانه مرتبط بفئة معينة ']);
            if ($medication->comapny)
                return redirect()->route('admin.medications')->with(['error' => 'هذا الدواء لا يمكن حذفه لانه مرتبط بشركة معينة ']);
            if ($medication->contraindication)
                return redirect()->route('admin.medications')->with(['error' => 'هذا الدواء لا يمكن حذفه لانه مرتبط بماتع دواء معين ']);

            $medication->delete();

            return redirect()->route('admin.medications')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.medications')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
