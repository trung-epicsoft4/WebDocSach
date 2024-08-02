<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $books = Book::all();
        $chapters = Chapter::all();
        $bookID = "";

        if (isset($data['sachID'])) {
            $bookID = $data['bookID'];
            $chapters = Chapter::where('bookID', $bookID)->get();
            return view('admin.chapter.index')->with(compact('chapters', 'books', 'bookID'));
        }
        
        return view('admin.chapter.index')->with(compact('chapters', 'books', 'bookID'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        return view('admin.chapter.create')->with(compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'bookID' => 'required',
                'title' => 'required|max:255',
                'order' => 'required|integer',
                'content' => 'required',
            ],
            [
                'bookID.required' => 'Vui lòng chọn sách!',
                'title.required' => 'Vui lòng nhập tiêu đề chương!',
                'order.required' => 'Vui lòng nhập chương số!',
                'content.required' => 'Vui lòng nhập nội dung cho chương!',
                'title.max' => 'Vui lòng nhập tiêu đề chương dưới 255 kí tự!',
                'order.integer' => 'Vui lòng nhập đúng định dạng của chương số!',
            ]
        );

        $chapter = new Chapter();
        $chapter->bookID = $data['bookID'];
        $chapter->order = $data['order'];
        $chapter->title = $data['title'];
        $chapter->content = $data['content'];
        $chapter->save();

        return redirect()->back()->with('status', 'Thêm chapter thành công'); 
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
        $chapter = Chapter::find($id);
        $books = Book::all();
        return view('admin.chapter.edit')->with(compact('chapter', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'bookID' => 'required',
                'title' => 'required|max:255',
                'order' => 'required|integer',
                'content' => 'required',
            ],
            [
                'bookID.required' => 'Vui lòng chọn sách!',
                'title.required' => 'Vui lòng nhập tiêu đề chương!',
                'order.required' => 'Vui lòng nhập chương số!',
                'content.required' => 'Vui lòng nhập nội dung cho chương!',
                'title.max' => 'Vui lòng nhập tiêu đề chương dưới 255 kí tự!',
                'order.integer' => 'Vui lòng nhập đúng định dạng của chương số!',
            ]
        );

        $chapter = Chapter::find($id);
        $chapter->bookID = $data['bookID'];
        $chapter->order = $data['order'];
        $chapter->title = $data['title'];
        $chapter->content = $data['content'];
        $chapter->update();
        return redirect()->back()->with('status', 'Sua chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();
        return redirect()->back()->with('status', 'Xoá chương thành công');
    }
}
