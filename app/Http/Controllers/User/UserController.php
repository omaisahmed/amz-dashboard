<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use db;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
         return view('users.create');
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'password'=> 'required',
            'roles'=> 'required',
        ]);

        User::where('id', $user->id)
        ->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'roles' => $request->input('roles'),
            
        ]);

        return redirect()->route('admin.user.index')->with('success','User Added Successfully!');
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=> 'required',
        ]);

        User::where('id', $user->id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
            
        ]);

        return redirect()->route('admin.user.index')->with('success','User Updated Successfully!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        // $user->delete();
        return redirect()->back()->with('success','User Deleted Successfully!');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
