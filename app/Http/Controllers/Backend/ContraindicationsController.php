<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;




use App\Models\Contraindications;
use Illuminate\Http\Request;
use DB;

class ContraindicationsController extends Controller
{

    public function index()
    {

        $contraindications = Contraindications::all();
        return view('dashboard.contraindications.index', compact('contraindications'));
    }

    public function create()
    {
        return view('dashboard.contraindications.create');
    }
    public function show($id)
    {
        $contraindication= Contraindications::where('id',$id)->first();


        return view('dashboard.contraindications.show', compact('contraindication'));
    }
    public function store(Request $request)
    {

        DB::beginTransaction();


        $category= Contraindications::create($request->except('_token'));
        $category->save();
        DB::commit();
        return redirect()->route('admin.contraindications')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {
        $category = Contraindications::find($id);

        if (!$category)
            return redirect()->route('admin.contraindications')->with(['error' => 'هذا المانع غير موجود ']);

        return view('dashboard.contraindications.edit', compact('category'));

    }
    public function update($id, Request $request)
    {
        try {

            //update DB
            $category = Contraindications::find($id);
            if (!$category)
                return redirect()->route('admin.contraindications')->with(['error' => 'هذا المانع غير موجود']);
            DB::beginTransaction();


            $category->update($request->except('_token', 'id'));



            DB::commit();
            return redirect()->route('admin.contraindications')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.contraindications')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $category = Contraindications::find($id);

            if (!$category)
                return redirect()->route('admin.contraindications')->with(['error' => 'هذا المانع غير موجود ']);

            $category->delete();

            return redirect()->route('admin.contraindications')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.contraindications')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
