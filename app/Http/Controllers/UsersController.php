<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($id){
        $user = User::findorFail($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }
    public function edit($id){
        $user = User::findorFail($id);

        return view('users.edit', ['user'=>$user]); 
        
    }
    public function update(Request $request,$id){
        $user = User::findOrFail($id);
        $user->name=$request->name;
        $user->self_introduce = $request->self_introduce;
        $user->save();
         
        return back();
    }
    
}
