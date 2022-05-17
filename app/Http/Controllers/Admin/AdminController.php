<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
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

        return redirect()->route('user.index')->with('success','User Updated Successfully!');
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
