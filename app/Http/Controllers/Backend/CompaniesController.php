<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;



use App\Models\Company;
use Illuminate\Http\Request;
use DB;

class CompaniesController extends Controller
{

    public function index()
    {

        $companies = Company::all();
        return view('dashboard.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('dashboard.companies.create');
    }
    public function show($id)
    {
        $company = Company::where('id',$id)->first();


        return view('dashboard.companies.show', compact('company'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();


        $category= Company::create($request->except('_token'));
        $category->save();
        DB::commit();
        return redirect()->route('admin.companies')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {
        $category = Company::find($id);

        if (!$category)
            return redirect()->route('admin.companies')->with(['error' => 'هذا الفئة غير موجود ']);

        return view('dashboard.companies.edit', compact('category'));

    }
    public function update($id, Request $request)
    {
        try {

            //update DB
            $category = Company::find($id);
            if (!$category)
                return redirect()->route('admin.companies')->with(['error' => 'هذا الفئة غير موجود']);
            DB::beginTransaction();


            $category->update($request->except('_token', 'id'));



            DB::commit();
            return redirect()->route('admin.companies')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.companies')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $category = Company::find($id);

            if (!$category)
                return redirect()->route('admin.companies')->with(['error' => 'هذا الفئة غير موجود ']);

            $category->delete();

            return redirect()->route('admin.companies')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.companies')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
