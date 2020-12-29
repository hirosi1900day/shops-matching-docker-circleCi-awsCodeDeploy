<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recruit;
use App\User;
class RecruitController extends Controller
{
    public function create(){
        return view('recruit.create');
    }
    public function store(Request $request){
        $request->user()->recruit()->create([
            'title'=>$request->title,
            'content' => $request->content,
        ]);
        return redirect(route('recruit.index'));
    }
    public function index(){
        $recruits=Recruit::get();
        return view('recruit.index',['recruits'=>$recruits]);
    }
    public function show(){
        $user=\Auth::user();
        $recruits=$user->recruit()->orderBy('created_at', 'desc')->get();
        return view('recruit.show',['recruits'=>$recruits]);
    }
    public function recruit_match($id){
        //idはrecruit_id
        \Auth::user()->recruit_match($id);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    public function match_delete($id){
         \Auth::user()->recruit_match_delete($id);
         return back();
    }
    public function match_index($id){
        //idはrecruit id
        $recruit=Recruit::findOrFail($id);
        $recruit_user_ids=$recruit->users()->get()->pluck('id');
       
        
        $shops=[];
        foreach($recruit_user_ids as $user_id){
            $shop=User::findOrFail($user_id)->shops()->get();
             array_push($shops,$shop);
        }
        return view('recruit.match_index',['shops'=>$shops]);
        
    }
    
    
}
