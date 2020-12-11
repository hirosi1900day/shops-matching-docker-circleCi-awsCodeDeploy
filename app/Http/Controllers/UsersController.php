<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
        'profile_image_location'=>['file','mimes:jpeg,png,jpg,bmb','max:2048'],
        ]);
         if($file = $request->profile_image_location){
        //保存するファイルに名前をつける    
        $fileName = time().'.'.$file->getClientOriginalExtension();
        
        $path = Storage::disk('s3')->putFileAs('/usersProfile',$file, $fileName,'public');
        }
        
        $user = User::findOrFail($id);
        $user->name=$request->name;
        $user->self_introduce = $request->self_introduce;
        if($file = $request->profile_image_location){
        $user->profile_image_location=$path;
        }
        $user->save();
         
        return redirect(route('users.show', ['user' => $id]));
    }
   
   
    public function delete_profile_photo($id){
        $user = User::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() == $id) {
        $deletename=$user->profile_image_location;
        // $deletePath='public/uploads/'.$deletename;
        Storage::disk('s3')->delete($deletename);
        $user->profile_image_location='';
        $user->save();
        
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
    
}
