new Vue({
  el: '#example',
  data: {
    activeTab: 'tabs-1',
  },
});

const buttonFaborite = {
  props: ['shopId'],
  template: `
    <button  v-on:click="storeProductId()">
      Favorite
    </button>
  `,
   data() {
    return { count: this.shopId };
  },
  methods: {
    storeProductId() {
      
      axios
        .post('favorites/'+this.count+'/favorite', {
          id: this.count
        })
        .then(response => {
          console.log("success");
        })
        .catch(err => {
          console.log("error");
        });
    },
  },
};


new Vue({
  el: '#favorite',
  components: {
    'like-component': buttonFaborite,
  },
});

