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
                'tendanhmuc.required' => 'Vui long nhap ten danh muc!',
                'tendanhmuc.unique' => 'Ten danh muc da ton tai, vui long nhap ten khac!',
                'motadanhmuc.required' => 'Vui long nhap mo ta danh muc!',
            ]
        );

        $danhMuc = new DanhMuc();
        $danhMuc->TenDanhMuc = $data['tendanhmuc']; 
        $danhMuc->MoTa = $data['motadanhmuc']; 
        $danhMuc->KichHoat = $data['kichhoat'];
        $danhMuc->save();
        return redirect()->back()->with('status', 'Them danh muc thanh cong'); 
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
                'tendanhmuc.required' => 'Vui long nhap ten danh muc!',
                'motadanhmuc.required' => 'Vui long nhap mo ta danh muc!',
            ]
        );

        $danhMuc = DanhMuc::find($id);
        $danhMuc->TenDanhMuc = $data['tendanhmuc']; 
        $danhMuc->MoTa = $data['motadanhmuc']; 
        $danhMuc->KichHoat = $data['kichhoat'];
        $danhMuc->update();
        return redirect()->back()->with('status', 'Cap nhat danh muc thanh cong'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DanhMuc::find($id)->delete();
        return redirect()->back()->with('status', 'Xoa danh muc thanh cong');  
    }
}
