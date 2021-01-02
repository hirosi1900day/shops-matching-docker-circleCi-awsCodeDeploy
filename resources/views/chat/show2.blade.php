@extends('layouts.app')

@section('content')
<div id="chat">
 <ul class="messages">
  <div v-for="(m,index) in messages.messages">

    <section v-if="m.user_id == {{Auth::id()}}">
      <li class="right-side">
        <a class="chat_user_name" href="{{route('users.show',['user'=>Auth::id()])}}">
            <div class="img-and-name">
                <span>{{Auth::user()->name}}</span>
                <div class="pic">
                    @if(Auth::user()->profile_image_location=='')
                        <img src="{{ Gravatar::get(Auth::user()->email) }}" alt="">
                    @else
                        <img src="{{Storage::disk('s3')->url(Auth::user()->profile_image_location)}}" alt="">
                    @endif
                </div>
            </div>
            <span v-text="m.message" class="chat_text"></span>
        </a>
      </li>
    </section>
    <section v-else>
      <li class="left-side">
        <a class="chat_user_name" href="{{route('users.show',['user'=>$user->id])}}">
           <div class="img-and-name">
               <span v-text="messages.users[index].name"></span>
               <div class="pic">
                   <!--<div v-if="messages.users[index].profile_image_location==''">-->
                   @if($user->profile_image_location=='')
                       <img src="{{ Gravatar::get($user->email) }}" alt="">
                   @else
                       <img src="{{Storage::disk('s3')->url($user->profile_image_location)}}" alt="">
                   @endif
               </div>
           </div>
        </a>  
           <span v-text="m.message" class="chat_text"></span>
      </li>
    </section>
 </div>
</ul>

  <form enctype="multipart/form-data" @submit.prevent="send" class="bg-light">
    <div class="input-group">
      <input
        type="text"
        placeholder="Type a message"
        aria-describedby="button-addon2"
        class="form-control rounded-0 border-0 py-4 bg-light"
        v-model="text"
      />
      <div class="input-group-append">
        <button type="submit">送信</button>
      </div>
    </div>
  </form>
  <button @click="getMessages" class="button">メッセージを更新</button>
</div>
<script src="/js/app.js"></script>
<script>
  new Vue({
    el: "#chat",
    data: {
      messages: [],
      text: "",
      shopId:"{{$chatroom->first()->shop_id}}",
      userId: "{{Auth::id()}}",
      roomId: "{{$chatroom->id}}",
    },
    methods: {
      getMessages() {
        
        axios.get(`/chat/${this.roomId}/show`).then((res) => {
          // propsで渡されたmessagesをarrayに入れている
          this.messages = res.data;
          console.log(this.messages);
          console.log('getMessages');
        });
      },
      send() {
     
        let obj = {
          message:this.text,
          user_id:this.userId,
          shop_id:this.shopId,
        };
       console.log(`/chat/${this.roomId}/store`);
        axios
          .post(`/chat/${this.roomId}/store`,obj)
          .then((res) => {
            this.getMessages();
            this.text="";
  
            console.log('sss');
          })
          .catch(function (error) {
            console.log(error);
          });
      },
    },
    mounted() {
    this.getMessages();
    },
  });
</script>
@endsection 
