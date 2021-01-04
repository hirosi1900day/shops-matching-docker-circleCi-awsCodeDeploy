@extends('layouts.app')

@section('content')
<div class="shops-index-container shadow">
    @if($recruit->user->profile_image_location=='')
        <img class="user-profile-image center" src="{{ Gravatar::get($recruit->user->email) }}" alt="">
    @else
        <img class="user-profile-image center" src="{{Storage::disk('s3')->url($recruit->user->profile_image_location)}}" alt="">
    @endif
    <div class="text-title">募集タイトル</div><div class="text">{{$recruit->title}}</div>
    <div class="text-title">募集内容</div><div class="text">{{$recruit->content}}</div>
    <div class="user_show_body">
        <div id="example2">
            <ul class="tabs-menu">
                <li v-bind:class="{active: activeTab === 'tabs-1'}" v-on:click="activeTab = 'tabs-1'">
                    自己紹介
                </li>
                <li v-bind:class="{active: activeTab === 'tabs-2'}" v-on:click="activeTab = 'tabs-2'">
                    掲載店舗
                </li>
            </ul>
            <section class="tabs-content">
                <section v-show="activeTab === 'tabs-1'" class="padding">
                    <p class="textForm">
                        <div class="text-title">自己紹介：</div></br>
                        <div class="text">{{$recruit->user->self_introduce}}</div>
                    </p>
                </section>
                <section v-show="activeTab === 'tabs-2'" class="background-gray-non-border">
                    <div class="users-show-shop">
                        @if(count($recruit->user->shops()->get())>0) 
                            @foreach($recruit->user->shops()->get() as $shop)
                            <div class="text-title">店舗名：</div><div class="text">{{$shop->name}}</div></br>
                            <div class="text-title">店舗画像</div></br>
                            <div class="center"><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image"></div>
                            <div class="text-title">店舗紹介：</div></br>
                            <div class="text">{{$shop->shop_introduce}}</div>
                            @endforeach 
                        @else
                            <p>店舗がありません</p>
                        @endif
                    </div>
                </section>
            </section>
        </div>
    </div>
</div>
@endsection