@extends('layouts.app')

@section('content')
<div class="border background-skyblue">
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}} 
                @if($user->profile_image_location=='')
                    <img class="user-profile-image center" src="{{ secure_asset('/img/welcom-main-photo/human2.png') }}" alt="">
                @else
                    <img class="user-profile-image" src="{{Storage::disk('s3')->url($user->profile_image_location)}}" alt="">
                    <a href="{{route('users.delete_profile_photo',['id'=>$user->id])}}" class="button">
                        <span>削除</span>
                    </a> 
               @endif
            </div>
            <a href="{{route('users.edit',['user'=>$user->id])}}" class="button">
                 <i class="fas fa-edit fa-2x"></i>
                 <span>情報を編集</span>
            </a>
        </div>
     </div>
    <div class="user_show_body">
        <div id="example">
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
                        自己紹介：</br>
                        {!! nl2br(e($user->self_introduce)) !!}
                    </p>
                </section>
                <section v-show="activeTab === 'tabs-2'" class="background-gray-non-border">
                    <div class="users-show-shop">
                        @if(count($user->shops()->get())>0) 
                            @foreach($user->shops()->get() as $shop)
                            店舗名：{{$shop->name}}</br>
                            店舗画像</br>
                            <div class="center"><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image"></div>
                            店舗紹介：</br>
                            {{$shop->shop_introduce}}
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