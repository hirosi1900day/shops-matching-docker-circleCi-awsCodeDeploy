@extends('layouts.app')

@section('content')
<!--<div v-for="message in array" :key="message.id">-->
<!--                 <div class="media-body ml-3">-->
<!--                   <div class="bg-light rounded py-2 px-3 mb-2">-->
<!--                     <p class="text-small mb-0 text-dark"></p>-->
<!--                 </div>-->
<!--               </div>-->
    <div id="chat">       
        <form enctype="multipart/form-data" @submit.prevent="send" class="bg-light">
          <div class="input-group">
             <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light" v-model="text">
             <div class="input-group-append">
             <input type="hidden" @submit="roomId = $event.target.value" value={{$chatroom->id}}>  
             <button id="button-addon2" type="submit" class="btn btn-link">送信</button>
             </div>
           </div>
         </form> 
        </div>  
         <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
   　　
   　　　 <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
   　　 　<script src="{{ secure_asset('/js/chat-vue.js') }}"></script>
@endsection 
