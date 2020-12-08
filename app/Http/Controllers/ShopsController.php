<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use Illuminate\Support\Facades\Storage;

class ShopsController extends Controller
{
     public function index(){
        $shops = Shop::all();
        foreach($shops as $index=>$shop){
           $shop_images[$index] = Storage::disk('s3')->url($shop->image_location);
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
    
   
    public function show($id){
        
       
         $shop = Shop::findOrFail($id);
         $path = Storage::disk('s3')->url($shop->image_location);
         $prefecture_array=['選択してください','北海道','青森','岩手','宮城','秋田','山形','福島',
        '茨城','栃木','群馬','埼玉','千葉','東京','神奈川','新潟','富山','石川','福井','山梨','長野','岐阜',
        '静岡','愛知','三重','滋賀','京都','大阪','兵庫','奈良','和歌山','鳥取','島根','岡山','広島','山口','徳島',
        '香川','愛媛','高知','福岡','佐賀','長崎','熊本','大分','宮崎','鹿児島','沖縄',];
        
        $shop_type_array=['選択してください','居酒屋','カフェ',
        '事務所','その他',];

         // メッセージ詳細ビューでそれを表示
         return view('shops.show', [
            'shop' => $shop,
            'prefecture_array'=>$prefecture_array,
            'shop_type_array'=>$shop_type_array,
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
            foreach($shops as $index=>$shop){
                $shop_images[$index] = Storage::disk('s3')->url($shop->image_location);
            }
            
            $data = [
                'user' => $user,
                'shops' => $shops,
                'shop_images'=>$shop_images,
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
