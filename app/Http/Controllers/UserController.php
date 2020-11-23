<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(5);
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/user')->with('status', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->input('password')) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->password = bcrypt($request->password);
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
        }
        $user->update();
        return redirect('/user')->with('status', 'Data Berhasil Diupdate!');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('/user')->with('status', 'Data Berhasil Dihapus!');
    }
}
