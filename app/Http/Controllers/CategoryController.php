<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::query();

        if ($request->name) {
            $categories->where('name', 'like', '%'.$request->name.'%');
        }

        if (isset($request->type)) {
            $categories->where('type', $request->type);
        }

        $categories = $categories->paginate(10);
        $categories->appends([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        $data = [
            'categories' => $categories
        ];

        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $category = Category::create([
                'code' => '',
                'name' => $request->name,
                'type' => $request->type,
            ]);

            $category->update([
                'code' => 'DM'.str_pad($category->id, 6, '0', STR_PAD_LEFT)
            ]);
            
            DB::commit();
            return redirect()->route('categories.index')->with('alert-success','Thêm danh mục thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm danh mục thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            'data_edit' => $category
        ];

        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();

            $category->update([
                'name' => $request->name,
                'type' => $request->type,
            ]);
            
            DB::commit();
            return redirect()->route('categories.index')->with('alert-success','Sửa danh mục thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa danh mục thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();

            if ($category->products->count() > 0) {
                return redirect()->back()->with('alert-error','Xóa danh mục thất bại! Danh mục '.$category->name.' đang có sản phẩm.');
            }

            if ($category->news->count() > 0) {
                return redirect()->back()->with('alert-error','Xóa danh mục thất bại! Danh mục '.$category->name.' đang có tin tức.');
            }

            $category->destroy($category->id);
            
            DB::commit();
            return redirect()->route('categories.index')->with('alert-success','Xóa danh mục thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa danh mục thất bại!');
        }
    }
}
