
var app = new Vue({
    created : function() {
        console.log("created");
    },
    mounted : function() {
        console.log("mounted");
    },
    updated : function() {
        console.log("updated");
    },
    destroyed : function() {
        console.log("destroyed");
    },
    el : '#app',
    data : {
        config : {
            'message1' : 'message1',
            'message2' : 'message2'
        }
    },
    components : {
        'mainPage' : require('../../components/homepage/main/MainPage.vue')
    }
})

