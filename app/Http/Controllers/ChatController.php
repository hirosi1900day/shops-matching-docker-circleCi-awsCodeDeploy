<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatroom;
use App\Chatroomuser;
use App\Chatmessage;
use App\User;
use Auth;


class ChatController extends Controller
{
    //  public function create(){
    //       $Chatroom = new Chatroom;

    //     // メッセージ作成ビューを表示
    //     return view('chat.show', [
    //         'Chatroom' => $Chatroom,
    //     ]);
    //  }
    
    public function show($id){
            
    $matching_user_id = $id;
    
    // 自分の持っているチャットルームを取得
    $current_user_chat_rooms = Chatroomuser::where('user_id', Auth::id())
    ->pluck('chatroom_id');

    // 自分の持っているチャットルームからチャット相手のいるルームを探す
    $chat_room_id = Chatroomuser::whereIn('chatroom_id', $current_user_chat_rooms)
        ->where('user_id', $matching_user_id)
        ->pluck('chatroom_id');


    // なければ作成する
    if ($chat_room_id->isEmpty()){

        Chatroom::create(); //チャットルーム作成
        
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
    
    // チャット相手のユーザー情報を取得
    $chat_room_user = User::findOrFail($matching_user_id);

    // チャット相手のユーザー名を取得
    $chat_room_user_name = $chat_room_user->name;

    $chat_messages = Chatmessage::where('chatroom_id', $chat_room_id)
    ->orderby('created_at')
    ->get();

    return view('chat.show', 
    compact('chat_room_id', 'chat_room_user',
    'chat_messages','chat_room_user_name'));

    }
    public function store(Request $request,$id){
        Chatroom::findOrFail($id)->chatroom_message()->create([
            'chatroom_id'=>$id,
            'user_id'=>Auth::id(),
            'message'=>$request->message,
            ]);
    
       $messageUserId=$request->id;
    
    
    return redirect(route('chat.show', ['id' => $messageUserId]));
        
    }
}
