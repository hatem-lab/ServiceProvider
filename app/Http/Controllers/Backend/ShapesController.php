<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;




use App\Models\Contraindications;
use App\Models\shapes;
use Illuminate\Http\Request;
use DB;

class ShapesController extends Controller
{

    public function index()
    {

        $shapes = shapes::all();
        return view('dashboard.shapes.index', compact('shapes'));
    }

    public function create()
    {
        return view('dashboard.shapes.create');
    }

    public function show($id)
    {
        $shape = shapes::where('id',$id)->first();


        return view('dashboard.shapes.show', compact('shape'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();


        $shape= shapes::create($request->except('_token'));
        $shape->save();
        DB::commit();
        return redirect()->route('admin.shapes')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {
        $category = shapes::find($id);

        if (!$category)
            return redirect()->route('admin.shapes')->with(['error' => 'هذا الشكل غير موجود ']);

        return view('dashboard.shapes.edit', compact('category'));

    }
    public function update($id, Request $request)
    {
        try {

            //update DB
            $category = shapes::find($id);
            if (!$category)
                return redirect()->route('admin.shapes')->with(['error' => 'هذا الشكل غير موجود']);
            DB::beginTransaction();


            $category->update($request->except('_token', 'id'));



            DB::commit();
            return redirect()->route('admin.shapes')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.shapes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $category = shapes::find($id);

            if (!$category)
                return redirect()->route('admin.shapes')->with(['error' => 'هذا الشكل غير موجود ']);

            $category->delete();

            return redirect()->route('admin.shapes')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.shapes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
