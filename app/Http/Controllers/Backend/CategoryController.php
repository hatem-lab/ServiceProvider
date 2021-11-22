<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function loadCategories(Request $request)
    {


    }

    public function create()
    {
        return view('dashboard.categories.create');
    }
    public function show($id)
    {
        $category = Category::where('id',$id)->first();


        return view('dashboard.categories.show', compact('category'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();


            $category= Category::create($request->except('_token'));
        $category->save();
        DB::commit();
        return redirect()->route('admin.categories')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category)
            return redirect()->route('admin.categories')->with(['error' => 'هذا الفئة غير موجود ']);

        return view('dashboard.categories.edit', compact('category'));

    }
    public function update($id, Request $request)
    {
        try {

            //update DB
            $category = Category::find($id);
            if (!$category)
                return redirect()->route('admin.categories')->with(['error' => 'هذا الفئة غير موجود']);
            DB::beginTransaction();


            $category->update($request->except('_token', 'id'));



            DB::commit();
            return redirect()->route('admin.categories')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.categories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $category = Category::find($id);

            if (!$category)
                return redirect()->route('admin.categories')->with(['error' => 'هذا الفئة غير موجود ']);

            $category->delete();

            return redirect()->route('admin.categories')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.categories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
