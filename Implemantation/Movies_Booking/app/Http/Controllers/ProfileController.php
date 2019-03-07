<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($id)
    {
        return View('Profiles.edit',[
            //'home'=>Auth::user()
        ]);
    }
    
   public function profileupdate(Request $request,$id)
   {
    $this->validate(request(),[
        'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            /*'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],*/
            'password' => ['required', 'string', 'min:6'],

    ]);
    $user=User::find($id);
    $user->name=$request->name;
    $user->address=$request->address;
    $user->phone=$request->phone;
    $user->email=$request->email;
    $user->password=$request->password;
    $user->save();
    return redirect()-> to('home')->with('success','Profile updated succesfully');
     /*$user->name=>$request->name;
        'address' => $data['address'],
        'phone' => $data['phone'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),*/

               
   }
}


