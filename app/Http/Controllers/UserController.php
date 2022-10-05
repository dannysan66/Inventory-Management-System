<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users,email'
        ]);
        $user = User::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
          'remember_token' => Str::random(10),
        ]);
        return redirect()->route('users.show',compact('user'));
    }


    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }


    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users,email'
        ]);
        $user->fill($request->all())->save();
        return redirect()->route('users.show',compact('user'));
    }


    public function destroy(User $user)
    {
        //
    }
}
