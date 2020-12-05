<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use Illuminate\Support\Facades\Storage;

class ShopsController extends Controller
{
     public function index(){
       $shops = Shop::all();
       foreach($shops as $shop){
           $shop_images = Storage::disk('s3')->url($shop->image_location);
       }
      
          // メッセージ一覧ビューでそれを表示
        return view('shops.index', [
            'shops' => $shops,
            'shop_images'=>$shop_images,
        ]);
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
        // $target_path = public_path('/uploads/');
        // $file->move($target_path,$fileName);
        $path = Storage::disk('s3')->putFileAs('/',$file, $fileName,'public');
       
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
    public function photo_delete($id){
        $shop=Shop::findOrFail($id);
        $deletename=$shop->image_location;
        // $deletePath='public/uploads/'.$deletePath;
        Storage::disk('s3')->delete($deletename);
        $shop->image_location->delete();
        return back();
        
    }
    public function photo_app(){
        
    }
    public function show($id){
        
       
         $shop = Shop::findOrFail($id);
         $path = Storage::disk('s3')->url($shop->image_location);

         // メッセージ詳細ビューでそれを表示
         return view('shops.show', [
            'shop' => $shop,
         ]);
    }
    
    public function mypage_shop(){
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
            return view('shops.user_shop',$data);
        
        
    }
}
    
    public function edit($id){
        
        // idの値でshopを検索して取得
        $shop = Shop::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('shops.edit', [
            'shop' => $shop,
        ]);
        
    }
    public function update(Request $request, $id){
        $shop = Shop::findOrFail($id);
        $request->validate([
        'name'=>['required','string','max:255'],
        'image_location'=>['required','file','mimes:jpeg,png,jpg,bmb','max:2048'],
       ]);
     if($file = $request->image_location){
      //保存するファイルに名前をつける    
        $fileName = time().'.'.$file->getClientOriginalExtension();
      //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
        //  $target_path = public_path('/uploads/');
        //  $file->move($target_path,$fileName);
        Storage::disk('s3')->delete($shop->image_location);
        $path = Storage::disk('s3')->putFileAs('/', $file, $fileName,'public');
       
    }else{
   //画像が登録されなかった時はから文字をいれる
        $name = "";
    }
   
        $shop->name=$request->name;
        $shop->image_location=$fileName;
        $shop->shop_location_prefecture=$request->shop_location_prefecture;
        $shop->shop_location=$request->shop_location;
        $shop->free_time=$request->free_time;
        $shop->shop_type=$request->shop_type;
        $shop->shop_introduce=$request->shop_introduce;
        $shop->save();
        return back();
    }
    public function destroy($id){
        // idの値で投稿を検索して取得
        $shop = Shop::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $shop->user_id) {
           $deletename=$shop->image_location;
        // $deletePath='public/uploads/'.$deletename;
        Storage::disk('s3')->delete($deletename);
        $shop->delete();
            
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
