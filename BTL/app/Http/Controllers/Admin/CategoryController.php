<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Base\AdminController;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:category|max:255',
                'activate' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục!',
                'name.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập tên khác!',
                'activate.required' => 'Vui lòng chọn kích hoạt hay không!',
            ]
        );

        $danhMuc = new Category();
        $danhMuc->name = $data['name']; 
        $danhMuc->activate = $data['activate'];
        $danhMuc->save();
        return redirect()->back()->with('status', 'Thêm danh mục thành công'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'activate' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục!',
                'activate.required' => 'Vui lòng chọn kích hoạt hay không!',
            ]
        );

        $danhMuc = Category::find($id);
        $danhMuc->name = $data['name']; 
        $danhMuc->activate = $data['activate'];
        $danhMuc->update();
        return redirect()->back()->with('status', 'Cập nhật danh mục thành công!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá danh mục thành công!');  
    }
}
