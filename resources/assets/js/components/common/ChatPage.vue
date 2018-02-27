<template>
    <div>
        <div class='message_body'>
            <div class="message_header">
                <span>
                    ID : <span class="userid">{{ user_id }} </span>
                    닉네임 : <input type='text' id='nick_name' maxlength="5" size="10" v-model='nick_name'/>
                </span>
                <br>
                <span>접속 : <span class='client_count'>{{ client_count }}</span> </span> 
                <span><span class="datetime">{{ datetime }}</span> </span>
            </div>
            <div class='message_content' id='message_content'>
                <div v-html='message_content'></div>
            </div>                 
            <div class='send_message'>
                <form onsubmit="return false;" method="post">
                    <input class='message' maxlength="100" id='message' v-on:keyup.13='sendMessage' type='text' autocomplete='off'/> 
                </form>
            </div>
        </div>
    </div>
</template>

<style>

.message_body {
    border : ridge;
}

.send_message {
    margin: auto;
}

.message {
    width:100%;
    height:50px;
    border-color:black;
}

.client_count {
    color : red;
}

.datetime {
    color : black;
    float : right;
}

li {
    list-style-type : none; 
    margin-left:20px; 
    margin-right:20px;
}

.message_text {
    margin-left : 30px;
    font-size : 13px;
    color: black;
}

.message_id {
    background-color:#f7f7f7; 
    font-size : 11px;
}

.my_id {
    color: #bf7878; 
}

.other_id {
    color: #27122d; 
}

.message_content {
    z-index : -1;
    position :relative;
    overflow:auto;
    height:660px;
    line-height:150%;
    word-wrap:break-word;
    border : solid 1px #968c8c;
    background-image : url("/image/chatting_bg.jpg");
    background-size : 100% 100%;
}

@media (max-width: 720px) {
    .message_content {
        height:300px;
    }
    .send_message {
        display :none;
    }
}
@media (min-width: 720px) and (max-width: 990px) {

}
@media (min-width: 990px) {

}
</style>


<script>

export default {
    created : function() {
        this.user_id = this.room_id+"_"+Math.floor(Math.random()*10000)+1;
        this.user_id_org = this.user_id;
        
        var message = {
            'room_id' : this.room_id,
            'user_id' : this.user_id_org
        };
        
        // room join
        this.socket.emit('joinRoom', JSON.stringify(message));
        this.datetime = this.getDateTime();
    },
    mounted: function() {
        
        // 소켓 receive
        this.socket.on(this.room_id, (data) => {

            var result = JSON.parse(data);
            var type = result['type'];
            switch (type) {
                case 'send_message' :
                    var user_id   = result['user_id'];
                    var user_name = result['user_name'];
                    var message   = result['message'];
                    var room_id   = result['room_id'];

                    if (this.room_id == room_id) {
                        
                        var receive_message = '';
                        var is_my_message = (user_id == this.user_id_org) ? true : false;
                        
                        if (this.last_message_id == '' || this.last_message_id != user_name) {
                            this.last_message_id = user_name;
                            if (user_id == this.user_id_org) {
                                receive_message = "<li class='message_id my_id'><strong>[" + user_name + "]</strong></li>";
                            } else {
                                receive_message = "<li class='message_id other_id'><strong>[" + user_name + "]</strong></li>";
                            }
                        }

                        receive_message+= "<li class='message_text'>" + message + "</li>";
                        
                        // 메세지 로드
                        this.addMessage(receive_message, is_my_message);
                    }
                    
                    break;
                case 'client_count' :
                    this.client_count  = result['client_count'];
                    break;
                default:
                    break;
            }
            
        });        
        
        // 현재 시간
        this.setDateTime();
    },
    watch : {
        nick_name : function(value, old_value) {
            if (value != '') {
                this.user_id = this.user_id_org+'('+value+')';
            } else {
                this.user_id = this.user_id_org;
            }
        }
    },
    data() {
        return {
            'user_id' : '',
            'user_id_org' : '',
            'nick_name' : '',
            'message_content' : '',
            'client_count' :'',
            'datetime' : '',
            'last_message_id' : '',
        }
    },
    props: [
        'socket',
        'room_id'
    ],
    methods: {
        sendMessage : function() {
            var message = $.trim($('.message').val());
            if (message == "") {
                return;
            }
            message = message.substr(0, 100);
            message = message.split('<img').join('');
            message = message.split('<a').join('');
            message = message.split('<button').join('');
            
            asyncRequest({
                url: '/homepage/ajax/send_message',
                data: {
                    room_id    : this.room_id,
                    message    : message,
                    user_id    : this.user_id_org,
                    user_name  : this.user_id,
                },
                success: (result) => {
                    $('.message').val('');
                }
            });
        },
        addMessage : function(message, is_my_message) {
            this.message_content+= message;
            
            if (is_my_message === true) {
                this.$nextTick(() => {
                    $(".message_content").scrollTop($(".message_content")[0].scrollHeight);
                });
            }
            
        },
        setDateTime : function() {
            
            setInterval(() => {
                this.datetime = this.getDateTime();
            }, 600);
        },
        getDateTime : function() {
            var date = new Date();
            var nowDate = date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
            return nowDate;
        }
    }
}

</script>
