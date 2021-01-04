@extends('layouts.app')

@section('content')
<div class="chat-padding">
    <ul class="messages">
        <li>
            <span class="text-title">質問内容</span>
            <span>{!! nl2br(e($help_question[0])) !!}</span>
        </li>
    </ul>
    <div id="chat_help">
        <ul class="messages">
            <div v-for="m in messages.input_question">
            <li class="left-side chat_user_name">
                <div class="img-and-name">
                    <span>あなた</span>
                </div>
                <span v-text="m" class="chat_text_help shadow"></span>
            </li>
            </div>
            <div v-for="m in messages.help_message">
            <li class="right-side chat_user_name">
                <div class="img-and-name">
                    <span>ヘルプデスク</span>
                </div>
                <span v-text="m" class="chat_text_help shadow"></span>
            </li>
            </div>
        </ul>

  <form enctype="multipart/form-data" @submit.prevent="send" class="bg-light">
      <div class="input-group chat_form_group">
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
  </div>
</div>
<script src="/js/app.js"></script>
<script>
  new Vue({
    el: "#chat_help",
    data: {
      messages: [],
      text: "",
    },
    methods: {
      
      send() {
        let obj = {
          help_message:this.text,
        };
        console.log('/chat/store_help');
        axios
          .post('/chat/store_help',obj)
          .then((res) => {
            this.messages = res.data;
            this.text="";
            console.log(this.messages);
          })
          .catch(function (error) {
            console.log(error);
          });
      },
    },
  });
</script>
@endsection 
