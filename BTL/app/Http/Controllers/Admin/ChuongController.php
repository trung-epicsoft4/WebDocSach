<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\Chuong;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $listSach = Sach::all();
        $danhSachChuong = Chuong::all();
        $sachID = "";

        if (isset($data['sachID'])) {
            $sachID = $data['sachID'];
            $danhSachChuong = Chuong::where('SachID', $sachID)->get();
            return view('admin.chuong.index')->with(compact('danhSachChuong', 'listSach', 'sachID'));
        }
        
        return view('admin.chuong.index')->with(compact('danhSachChuong', 'listSach', 'sachID'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listSach = Sach::all();
        return view('admin.chuong.create')->with(compact('listSach'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'sachID' => 'required',
                'tieude' => 'required|max:255',
                'chuongso' => 'required|integer',
                'noidung' => 'required',
            ],
            [
                'sachID.required' => 'Vui lòng chọn sách!',
                'tieude.required' => 'Vui lòng nhập tiêu đề chương!',
                'chuongso.required' => 'Vui lòng nhập chương số!',
                'noidung.required' => 'Vui lòng nhập nội dung cho chương!',
                'tieude.max' => 'Vui lòng nhập tiêu đề chương dưới 255 kí tự!',
                'chuongso.integer' => 'Vui lòng nhập đúng định dạng của chương số!',
            ]
        );

        $chuong = new Chuong();
        $chuong->SachID = $data['sachID'];
        $chuong->SoChuong = $data['chuongso'];
        $chuong->TieuDe = $data['tieude'];
        $chuong->NoiDung = $data['noidung'];
        $chuong->save();
        return redirect()->back()->with('status', 'Thêm chuong thành công'); 
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
        $chuong = Chuong::find($id);
        $listSach = Sach::all();
        return view('admin.chuong.edit')->with(compact('chuong', 'listSach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'sachID' => 'required',
                'tieude' => 'required|max:255',
                'chuongso' => 'required|integer',
                'noidung' => 'required',
            ],
            [
                'sachID.required' => 'Vui lòng chọn sách!',
                'tieude.required' => 'Vui lòng nhập tiêu đề chương!',
                'chuongso.required' => 'Vui lòng nhập chương số!',
                'noidung.required' => 'Vui lòng nhập nội dung cho chương!',
                'tieude.max' => 'Vui lòng nhập tiêu đề chương dưới 255 kí tự!',
                'chuongso.integer' => 'Vui lòng nhập đúng định dạng của chương số!',
            ]
        );

        $chuong = Chuong::find($id);
        $chuong->SachID = $data['sachID'];
        $chuong->SoChuong = $data['chuongso'];
        $chuong->TieuDe = $data['tieude'];
        $chuong->NoiDung = $data['noidung'];
        $chuong->update();
        return redirect()->back()->with('status', 'Sua chuong thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chuong = Chuong::find($id);
        $chuong->delete();
        return redirect()->back()->with('status', 'Xoá chương thành công');
    }
}
