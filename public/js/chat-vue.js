new Vue({
    el: '#chat',
    data: {
        message: ''
    },
    methods: {
        send() {
       console.log('aaa');
            const url = 'chat/$(chat-button).value/store';
            const params = { message: this.message };
            axios.post(url, params)
                .then((response) => {

                    // 成功したらメッセージをクリア
                    this.message = '';

                });

        }
    }
});