<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatroom;
use App\Chatroomuser;
use App\Chatmessage;
use App\User;
use App\Shop;
use Auth;


class ChatController extends Controller
{
    
    public function index(){
        
        $current_room_ids = Chatroomuser::where('user_id', Auth::id())
                                  ->pluck('chatroom_id');
        
        foreach( $current_room_ids as  $index=>$current_room_id){
            $current_user_rooms[$index]=Chatroomuser::findOrFail($current_room_id);
        }
        
      
     
        if(count($current_user_rooms)==0){
            $current_user_rooms=[];
        }
       
        
        return view('chat.index',[
            'current_user_rooms'=>$current_user_rooms
            ]);
    }
    public function show($id){
        //$idはユーザーid
        $matching_user_id = $id;
    
        // 自分の持っているチャットルームを取得
        $current_user_chat_rooms = Chatroomuser::where('user_id', Auth::id())
        ->pluck('chatroom_id');

        // 自分の持っているチャットルームからチャット相手のいるルームを探す
        $chat_room_id = Chatroomuser::whereIn('chatroom_id', $current_user_chat_rooms)
        ->where('user_id', $matching_user_id)
        ->pluck('chatroom_id');
        
          // チャット相手のユーザー情報を取得
        $chat_room_user = User::findOrFail($matching_user_id);
        $chat_room_user_shops_name=$chat_room_user->shops->first()->name;

        // チャット相手のユーザー名を取得
        $chat_room_user_name = $chat_room_user->name;
        $chat_room_name='';
       
        // なければ作成する
        if ($chat_room_id->isEmpty()){

            Chatroom::create(['name'=>$chat_room_name]); //チャットルーム作成
        
            $latest_chat_room = Chatroom::orderBy('created_at', 'desc')->first(); //最新チャットルームを取得

            $chat_room_id = $latest_chat_room->id;

            // 新規登録 モデル側 $fillableで許可したフィールドを指定して保存
            Chatroomuser::create( 
                ['chatroom_id' => $chat_room_id,
                'user_id' => Auth::id()]);

            Chatroomuser::create(
                ['chatroom_id' => $chat_room_id,
                'user_id' => $matching_user_id]);
        }

        // チャットルーム取得時はオブジェクト型なので数値に変換
        if(is_object($chat_room_id)){
            $chat_room_id = $chat_room_id->first();
        }
        
        
    
      
        // $messege_chatroom=Chatroom::findOrFail('chatroom_id');
        // $messege_chatroom->name=$chat_room_user_name;
        // $message_chatroom->save();
        $chat_messages = Chatmessage::where('chatroom_id', $chat_room_id)
        ->orderby('created_at','desc')
        ->paginate(5);
        

        return view('chat.show', 
            compact('chat_room_id', 'chat_room_user',
                    'chat_messages','chat_room_user_name'));

    }
    public function store(Request $request,$id){
        $request->validate([
            'message' => 'required|max:255',
        ]);
        Chatroom::findOrFail($id)->chatroom_message()->create([
            'chatroom_id'=>$id,
            'user_id'=>Auth::id(),
            'message'=>$request->message,
            ]);
    
        $messageUserId=$request->userId;
    
      
        return redirect(route('chat.show', ['id' => $messageUserId]));
        
    }
    public function message_redirect($id){
        return redirect(route('chat.show', ['id' => $id]));  
    }
}
