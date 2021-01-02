@extends('layouts.app')

@section('content')
<div id="recruit_favorite">
@foreach($recruits as $recruit)
<div class="shops-index-container shadow">
   <div>
        @if($recruit->user->profile_image_location=='')
            <img class="user-profile-image center" src="{{ Gravatar::get($recruit->user->email) }}" alt="">
        @else
            <img class="user-profile-image center" src="{{Storage::disk('s3')->url($recruit->user->profile_image_location)}}" alt="">
        @endif
    </div>
   <div><div>募集タイトル</div>{{$recruit->title}}</div>
   <div><div>募集内容</div>{{$recruit->content}}</div>
   @if($recruit->user_id!=Auth::user()->id)
      <like :recruit-id="{{$recruit->id}}"></like>
   @endif
</div>
@endforeach
</div>
<script src="/js/app.js"></script>

<script>
  
  const buttonRecruit = {
  template: `
    <div>
       <div v-if="status == false" type="button" @click.prevent="like" class="btn btn-primary btn-block">みてみてコールを送る</div>
       <div v-else type="button" @click.prevent="unlike" class="btn btn-danger btn-block">みてみてコールを取り下げる</div>
    </div>
  `,
  props: ['recruitId'],  
  data() {
   return {
     status: false,
     recruitId:'recruitId'
   }
 },
 created() {
   this.like_check()
 },
 methods: {
    like_check() {
      const path = `/recruit/${this.recruitId}/match_check`;
      console.log(`/favorites/${this.recruitId}/check`);
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
     const path = `/recruit/${this.recruitId}/match`
     axios.post(path).then(res => {
       this.like_check()
     }).catch(function(err) {
       console.log(err)
     })
   },
   unlike(){
     const path =`/recruit/${this.recruitId}/match_delete`
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
  el: '#recruit_favorite',
  components: {
    'like': buttonRecruit,
  },
});

</script>


@endsection