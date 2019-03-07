<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Auth;
use App\User;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $user=Auth::user();
        return view('auth.edit');
    }
    public function update(User $user)
    {
        $this->validate(request(),[
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $user->name=request('name');
        $user->address=request('address');
        $user->phone=request('phone');
        $user->email=request('email');
        $user->password=request('password');
        $user->save();
        return redirect()->to('/home')->with('success','profile Update Succefully');

    }
    public function show($id)
    {
             return view('auth.edit',['user'=> User::findOrFail($id)]);
    }
}
