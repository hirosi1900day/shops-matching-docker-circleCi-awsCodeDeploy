@extends('layouts.app')

@section('content')



<div class="background-skyblue">
    <h1>shop一覧</h1>
  <div>
    {!! Form::open(['route'=>'shops.narrow_down']) !!}
   
    <div class='form-group'>
        {!! Form::label('prefecture_id', '都道府県') !!}
        {!! Form::select('prefecture_id',['選択してください','北海道','青森','岩手','宮城','秋田','山形','福島',
        '茨城','栃木','群馬','埼玉','千葉','東京','神奈川','新潟','富山','石川','福井','山梨','長野','岐阜',
        '静岡','愛知','三重','滋賀','京都','大阪','兵庫','奈良','和歌山','鳥取','島根','岡山','広島','山口','徳島',
        '香川','愛媛','高知','福岡','佐賀','長崎','熊本','大分','宮崎','鹿児島','沖縄',],0,['class'=>'form-control']) !!}
    </div>
    
    <div class='form-group'>
        {!! Form::label('shop_type_id', '店舗ジャンル') !!}
        {!! Form::select('shop_type',['選択してください','居酒屋','カフェ',
        '事務所','その他',],0,['class'=>'form-control']) !!}
    </div>
    <div>
       {!! Form::submit('絞り込む',['class'=>'btn btn-info']) !!}
       {!! Form::close() !!}   
    </div>
 </div>
    <div id="favorite">  
    @if (count($shops) > 0)
      
      @foreach ($shops as $index=>$shop)
       
       <div class="shops-index-container shadow">
            <div>
                @if($shop->user->profile_image_location=='')
                    <img class="user-profile-image center" src="{{ Gravatar::get($shop->user->email) }}" alt="">
                @else
                    <img class="user-profile-image center" src="{{Storage::disk('s3')->url($shop->user->profile_image_location)}}" alt="">
                @endif
            </div>
           <div class="grid-shop-index">
             
                <div><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image shadow"></div>
                <div>
                    <div class="text-title">店舗名</div><div class="text">{{$shop->name}}</div>
                    <div class="text-title">都道府県</div><div class="text">{{config('const.prefecture_array')[$shop->shop_location_prefecture]}}</div>
                    <div class="text-title">貸出可能時間</div><div class="text">{{$shop->free_time}}</div>
                    <div class="text-title">店舗の種類</div><div class="text">{{ config('const.prefecture_array')[$shop->shop_type]}}</div>
                
                    @if($shop->user_id!=Auth::user()->id)
                        <div class="flex-favorite">
                           <a href="{{route('shops.show',['shop'=>$shop->id])}}" class="button">
                              <span>店舗情報詳細へ</span>
                           </a>
                           <a href="{{route('chat.create_chatroom',['id'=>$shop->id])}}" class="button">
                               <span>メッセージへ</span>
        　                  </a>
                           <like :shop-id="{{$shop->id}}"></like>
                        </div>
             　 
                    @endif
                </div>
           </div>
    
       </div>        
    @endforeach 
   
    @else
    <div>店舗がありません</div>
    @endif
</div>
<script src="/js/app.js"></script>
<script>
  
  const buttonPreference = {
  template: `
    <div>
       <div v-if="status == false" type="button" @click.prevent="like" class="button"><div>気になる</div></div>
       <div v-else type="button" @click.prevent="unlike" class="button-delete"><div>気になるを解除する</div></div>
    </div>
  `,
  props: ['shopId'],  
  data() {
   return {
     status: false,
     shopId:'shopId'
   }
 },
 created() {
   this.like_check()
 },
 methods: {
    like_check() {
    // const id = this.shopId;
    // const array = ["/favorites/",id,"/check"];
    // const path = array.join('')
      const path = `/favorites/${this.shopId}/check`;
      console.log(`/favorites/${this.shopId}/check`);
      axios.get(path).then(res => {
      console.log('a');
       if(res.data==true) {
         this.status = true
       } else {
         this.status = false
       }
     }).catch(function(err) {
       console.log(err)
     })
   },
   like() {
     const id = this.shopId
     
     const path = `favorites/${this.shopId}/favoite`
     axios.post(path).then(res => {
       this.like_check()
     }).catch(function(err) {
       console.log(err)
     })
   },
   unlike(){
     const path =`favorites/${this.shopId}/unfavorite`
     axios.delete(path).then(res => {
       console.log('dd')
       this.like_check()
     }).catch(function(err) {
       console.log(err)
     })
  },
 },
  
};

new Vue({
  el: '#favorite',
  components: {
    'like': buttonPreference,
  },
});

</script>
    

@endsection