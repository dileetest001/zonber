var socket = io.connect('http://zonber.trenditplatform.co.kr:8888');

var app = new Vue({
    created : function() {
    },
    mounted : function() {
    },
    updated : function() {
    },
    destroyed : function() {
    },
    el : '#app',
    data : {
        socket  : socket,
    },
    components : {
        'coinPage'  : require('../components/homepage/CoinPage.vue'),
        'chatPage'  : require('../components/common/ChatPage.vue'),
    }
})

