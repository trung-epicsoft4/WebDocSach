<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSachDanhMuc = DanhMuc::orderBy('id', 'DESC')->get();
        return view('admin.danhmuc.index')->with(compact('danhSachDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tendanhmuc' => 'required|unique:danhmuc|max:255',
                'motadanhmuc' => 'required|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tendanhmuc.required' => 'Vui lòng nhập tên danh mục!',
                'tendanhmuc.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập tên khác!',
                'motadanhmuc.required' => 'Vui lòng nhập mô tả danh mục!',
                'kichhoat.required' => 'Vui lòng chọn kích hoạt hay không!',
            ]
        );

        $danhMuc = new DanhMuc();
        $danhMuc->TenDanhMuc = $data['tendanhmuc']; 
        $danhMuc->MoTa = $data['motadanhmuc']; 
        $danhMuc->KichHoat = $data['kichhoat'];
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
        $danhMuc = DanhMuc::find($id);
        return view('admin.danhmuc.edit')->with(compact('danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'tendanhmuc' => 'required|max:255',
                'motadanhmuc' => 'required|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tendanhmuc.required' => 'Vui lòng nhập tên danh mục!',
                'motadanhmuc.required' => 'Vui lòng nhập mô tả danh mục!',
            ]
        );

        $danhMuc = DanhMuc::find($id);
        $danhMuc->TenDanhMuc = $data['tendanhmuc']; 
        $danhMuc->MoTa = $data['motadanhmuc']; 
        $danhMuc->KichHoat = $data['kichhoat'];
        $danhMuc->update();
        return redirect()->back()->with('status', 'Cập nhật danh mục thành công!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DanhMuc::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá danh mục thành công!');  
    }
}
