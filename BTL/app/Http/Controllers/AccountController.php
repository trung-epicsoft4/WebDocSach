<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.account.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'unique:users',
                'username' => 'required',
                'password' => 'required',
                'role' => 'required',
            ],
            [
                'email.unique' => 'Email này đã tồn tại, vui lòng nhập email khác',
            ]
        );

        $user = new User();
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role'];
        $user->save();
        return redirect()->back()->with('status', 'Thêm tài khoản thành công'); 
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
        $user = User::find($id);
        return view('admin.account.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->validator($request->all(), $id)->validate();
        $user = User::find($id);

        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];

        $currentUser = Auth::user();
        if ($currentUser['id'] == $id && $currentUser['role'] != $data['role']) {
            return redirect()->back()->with('error','Không thể sửa role của tài khoản này!');
        }

        $user->update();
        return redirect()->back()->with('status','Sửa thành công!');
    }

    protected function validator(array $data, string $id)
    {
        return Validator::make($data, 
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id,],
            'password' => ['nullable','string', 'min:8', 'confirmed'],
            'role' => 'required',
        ]
    );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (Auth::user()->id == $user->id) {
            return redirect()->back()->with('error','Không thể xoá tài khoản này!');
        }

        $user->delete();
        return redirect()->back()->with('status','Xoá thành công!');
    }
}
