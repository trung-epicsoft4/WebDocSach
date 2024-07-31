<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Sach;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class SachController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSachSach = Sach::with('danhmuc')->get();
        return view('admin.sach.index')->with(compact('danhSachSach'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danhSachDanhMuc = DanhMuc::all();
        return view('admin.sach.create')->with(compact(('danhSachDanhMuc')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {         
        $data = $request->validate(
            [
                'tensach' => 'required|unique:sach|max:255',
                'tacgia' => 'required|max:255',
                'namxuatban' => 'required|integer',
                'danhmucsach' => 'required',
                'motasach' => 'required',
                'hinhanh' => 'required|image',
                'kichhoat' => 'required',
            ],
            [
                'tensach.required' => 'Vui lòng nhập tên sách!',
                'tensach.unique' => 'Tên sách đã tồn tại, vui lòng nhập tên khác!',
                'tensach.max' => 'Ten sach qua ki tu cho phep, vui long nhap ten sach duoi 255 ki tu!',
                'tacgia.required' => 'Vui lòng nhập ten tac gia!',
                'tacgia.max' => 'Ten tac gia qua ki tu cho phep, vui long nhap ten tac gia duoi 255 ki tu!',
                'namxuatban.required' => 'Vui long nhap nam xuat ban!',
                'namxuatban.integer' => 'Vui long nhap dung dinh dang nam!',
                'danhmucsach.required' => 'Vui lòng chọn danh mục sách!',
                'motasach.required' => 'Vui lòng nhập mô tả sách!',
                'hinhanh.required' => 'Vui lòng chọn hình ảnh!',
                'kichhoat.required' => 'Vui lòng chọn kích hoạt hay không!',
            ]
        );

        $sach = new Sach();
        $sach->TenSach = $data['tensach']; 
        $sach->TacGia = $data['tacgia']; 
        $sach->NamXuatBan = $data['namxuatban'];
        $sach->DanhMucID = $data['danhmucsach'];
        $sach->MoTa = $data['motasach']; 
        $sach->KichHoat = $data['kichhoat'];

        $get_image = $data['hinhanh'];
        $path = "public/uploads/sach/";
        $newImageName = $data['tensach'].'.'.$get_image->getClientOriginalName();
        $get_image->move($path, $newImageName);

        $sach->HinhAnh = $newImageName;
        $sach->save();

        return redirect()->back()->with('status', 'Thêm sách thành công'); 
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
        $danhSachDanhMuc = DanhMuc::all();
        $sach = Sach::find($id);
        return view('admin.sach.edit')->with(compact('sach', 'danhSachDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'tensach' => 'required|max:255',
                'motasach' => 'required',
                'kichhoat' => 'required',
                'danhmucsach' => 'required',
                'noidungsach' => 'required',
            ],
            [
                'tensach.required' => 'Vui lòng nhập tên sách!',
                'tensach.unique' => 'Tên sách đã tồn tại, vui lòng nhập tên khác!',
                'motasach.required' => 'Vui lòng nhập mô tả sách!',
                'kichhoat.required' => 'Vui lòng chọn kích hoạt hay không!',
                'danhmucsach.required' => 'Vui lòng chọn danh mục sách!',
                'noidungsach.required' => 'Vui lòng nhập nội dung!',
            ]
        );

        $sach = Sach::find($id);
        $sach->TenSach = $data['tensach']; 
        $sach->DanhMucID = $data['danhmucsach'];
        $sach->MoTa = $data['motasach']; 
        $sach->KichHoat = $data['kichhoat'];
        $sach->NoiDung = $data['noidungsach'];

        if (isset($data['hinhanh'])) {
            $get_image = $data['hinhanh'];
            $path = "public/uploads/sach/";
            $newImageName = $data['tensach'].'.'.$get_image->getClientOriginalName();
            $get_image->move($path, $newImageName);
            $sach->HinhAnh = $newImageName;
        }
        
        $sach->update();
        return redirect()->back()->with('status', 'Cập nhật sách thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sach = Sach::find($id);
        $imageFile = "public/uploads/sach/".$sach['HinhAnh'];
        $file = "public/uploads/sach/".$sach['FileSach'];

        if (file_exists($imageFile)) {
            unlink($imageFile);
        }

        if (file_exists($file)) {
            unlink($file);
        }

        Sach::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá sách thành công!');  
    }
}
