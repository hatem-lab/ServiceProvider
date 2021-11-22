<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;




use App\Models\Contraindications;
use App\Models\doses;
use App\Models\shapes;
use Illuminate\Http\Request;
use DB;

class DosesController extends Controller
{

    public function index()
    {

        $shapes = doses::all();
        return view('dashboard.doses.index', compact('shapes'));
    }

    public function create()
    {
        return view('dashboard.doses.create');
    }
    public function show($id)
    {
        $dose= doses::where('id',$id)->first();


        return view('dashboard.doses.show', compact('dose'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();


        $shape= doses::create($request->except('_token'));
        $shape->save();
        DB::commit();
        return redirect()->route('admin.doses')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {
        $category = doses::find($id);

        if (!$category)
            return redirect()->route('admin.doses')->with(['error' => 'هذا الجرعة غير موجود ']);

        return view('dashboard.shapes.edit', compact('category'));

    }
    public function update($id, Request $request)
    {
        try {

            //update DB
            $category = doses::find($id);
            if (!$category)
                return redirect()->route('admin.doses')->with(['error' => 'هذا الجرعة غير موجود']);
            DB::beginTransaction();


            $category->update($request->except('_token', 'id'));



            DB::commit();
            return redirect()->route('admin.doses')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.doses')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $category = doses::find($id);

            if (!$category)
                return redirect()->route('admin.doses')->with(['error' => 'هذه الجرعة غير موجود ']);

            $category->delete();

            return redirect()->route('admin.doses')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.doses')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
