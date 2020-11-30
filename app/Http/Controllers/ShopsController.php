<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopsController extends Controller
{
     public function index(){
        
    }
    public function create(){
          
        // メッセージ作成ビューを表示
        return view('shops.create');
    }
    public function store(Request $request){
        $request->validate([
        'name'=>['required','string','max:255'],
        'image_location'=>['file','mimes:jpeg,png,jpg,bmb','max:2048'],
       ]);
       if($file = $request->image_location){
      //保存するファイルに名前をつける    
      $fileName = time().'.'.$file->getClientOriginalExtension();
      //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
      $target_path = public_path('/uploads/');
      $file->move($target_path,$fileName);
       
    }else{
   //画像が登録されなかった時はから文字をいれる
   $name = "";
    }
   $request->user()->shops()->create([
    'name'=>$request->name,
    'image_location'=>$fileName,
    'shop_location_prefecture'=>$request->shop_location_prefecture,
    'shop_location'=>$request->shop_location,
    'free_time'=>$request->free_time,
    'shop_type'=>$request->shop_type,
    'shop_introduce'=>$request->shop_introduce,
   ]);
   return back();
       
       
    }
    public function show(){
        
    }
    public function edit(){
        //Myshopについての記載
        $data = [];
        if (\Auth::check()){
            
            // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザのshopの一覧を作成日時の降順で取得
            $shops = $user->shops()->orderBy('created_at', 'desc')->get();

            $data = [
                'user' => $user,
                'shops' => $shops,
            ];
        
        
        }


        // shops.editビューでそれらを表示
        return view('shops.edit', $data);
        
        
    }
    public function update(){
        
    }
}
