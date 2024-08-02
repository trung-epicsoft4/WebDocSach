<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Base\AdminController;

class BookController extends AdminController
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get();
        return view('admin.book.index')->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danhSachDanhMuc = Category::all();
        return view('admin.book.create')->with(compact(('danhSachDanhMuc')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {         
        $data = $request->validate(
            [
                'title' => 'required|unique:book|max:255',
                'author' => 'required|max:255',
                'year' => 'required|integer',
                'categoryID' => 'required',
                'description' => 'required',
                'image' => 'required|image',
                'activate' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tên sách!',
                'title.unique' => 'Tên sách đã tồn tại, vui lòng nhập tên khác!',
                'title.max' => 'Ten sach qua ki tu cho phep, vui long nhap ten sach duoi 255 ki tu!',
                'author.required' => 'Vui lòng nhập ten tac gia!',
                'author.max' => 'Ten tac gia qua ki tu cho phep, vui long nhap ten tac gia duoi 255 ki tu!',
                'year.required' => 'Vui long nhap nam xuat ban!',
                'year.integer' => 'Vui long nhap dung dinh dang nam!',
                'categoryID.required' => 'Vui lòng chọn danh mục sách!',
                'description.required' => 'Vui lòng nhập mô tả sách!',
                'image.required' => 'Vui lòng chọn hình ảnh!',
                'activate.required' => 'Vui lòng chọn kích hoạt hay không!',
            ]
        );

        $sach = new Book();
        $sach->title = $data['title']; 
        $sach->author = $data['author']; 
        $sach->year = $data['year'];
        $sach->categoryID = $data['categoryID'];
        $sach->description = $data['description']; 
        $sach->activate = $data['activate'];

        $get_image = $data['image'];
        $path = "public/uploads/sach/";
        $newImageName = $data['title'].'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $newImageName);

        $sach->image = $newImageName;
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
        $danhSachDanhMuc = Category::all();
        $book = Book::find($id);
        return view('admin.book.edit')->with(compact('book', 'danhSachDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'author' => 'required|max:255',
                'year' => 'required|integer',
                'categoryID' => 'required',
                'description' => 'required',
                'image' => 'image',
                'activate' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tên sách!',
                'title.unique' => 'Tên sách đã tồn tại, vui lòng nhập tên khác!',
                'title.max' => 'Ten sach qua ki tu cho phep, vui long nhap ten sach duoi 255 ki tu!',
                'author.required' => 'Vui lòng nhập ten tac gia!',
                'author.max' => 'Ten tac gia qua ki tu cho phep, vui long nhap ten tac gia duoi 255 ki tu!',
                'year.required' => 'Vui long nhap nam xuat ban!',
                'year.integer' => 'Vui long nhap dung dinh dang nam!',
                'categoryID.required' => 'Vui lòng chọn danh mục sách!',
                'description.required' => 'Vui lòng nhập mô tả sách!',
                'image.required' => 'Vui lòng chọn hình ảnh!',
                'activate.required' => 'Vui lòng chọn kích hoạt hay không!',
            ]
        );

        $sach = Book::find($id);
        $sach->title = $data['title']; 
        $sach->author = $data['author']; 
        $sach->year = $data['year'];
        $sach->categoryID = $data['categoryID'];
        $sach->description = $data['description']; 
        $sach->activate = $data['activate'];

        if (isset($data['image'])) {
            $get_image = $data['image'];
            $path = "public/uploads/sach/";
            $newImageName = $data['title'].'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $newImageName);
            $sach->image = $newImageName;
        }

        $sach->update();

        return redirect()->back()->with('status', 'Cập nhật sách thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sach = Book::find($id);
        $imageFile = "public/uploads/sach/".$sach['image'];

        if (file_exists($imageFile)) {
            unlink($imageFile);
        }

        Book::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá sách thành công!');  
    }
}
