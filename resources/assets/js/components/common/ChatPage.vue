<template>
    <div>
        <div class="ad_info">
            <br>
            <p>{{ room_id }} 기부 </p>
            <p>{{ account }}</p>
        </div>
        <div class='message_body'>
            <div class="message_header">
                <span>ID : <span class="userid">{{ user_id }}</span> </span>
                <br>
                <span>접속 : <span class='client_count'>{{ client_count }}</span> </span> 
                <span><span class="datetime">{{ datetime }}</span> </span>
            </div>
            <div class='message_content' id='message_content'>
                <div v-html='message_content'></div>
            </div>
            <div class='send_message'>
                <form onsubmit="return false;" method="post">
                    <input class='message' id='message' v-on:keyup.13='sendMessage' type='text' autocomplete='off'/> 
                </form>
            </div>
        </div>
    </div>
</template>

<style>
.ad_info {
    border : 1px solid #bb504e;
    height:100px;
    text-align: center;
}

.message_body {
    border : ridge;
}
.message_content {
    overflow:auto;
    overflow-x:hidden;
    height:400px;
    line-height:150%;
    background-color:white;
    word-wrap:break-word;
    border : solid 1px #968c8c;
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
    font-size : 14px;
    color: black;
}

.message_id {
    background-color:#f7f7f7; 
    color: #bf7878; 
    font-size : 12px;
}

</style>


<script>

export default {
    created : function() {
        this.user_id = this.room_id+"_"+Math.floor(Math.random()*10000)+1;
        
        var message = {
            'room_id' : this.room_id,
            'user_id' : this.user_id
        };

        this.socket.emit('joinRoom', JSON.stringify(message));
        this.datetime = this.getDateTime();
        
        if (this.room_id == 'btc') {
            this.account = '3GavawtgH2CFKthH2EoswfxaMiiQh68Sjx';
        } else if (this.room_id == 'bch') {
            this.account = '3KWo7RVc99PGryiQRguDg8vFBJNcAjvtjR';
        } else if (this.room_id == 'eth') {
            this.account = '0x345fae7b1e8ba8928574325e3c20e5f8a52b5da8';
        } else if (this.room_id == 'etc') {
            this.account = '0xb65a305af59396f65f1c615fb9df1e934dcab48b';
        } else if (this.room_id == 'xrp') {
            this.account = 'rN9qNpgnBaZwqCg8CvUZRPqCcPPY7wfWep // 1752738475';
        } else if (this.room_id == 'ltc') {
            this.account = '3J3vtAJ1AkvxU5EZQS11q8awzKxAozxpdo';
        } else if (this.room_id == 'btg') {
            this.account = 'AZ9vxk6kxhCxkX5nGfmu85ayRCTsnAnHmR';
        } else if (this.room_id == 'zec') {
            this.account = '성투하세요';
        }
        
    },
    mounted: function() {
        
        // 소켓 receive
        this.socket.on(this.room_id, (data) => {

            var result = JSON.parse(data);
            var type = result['type'];
            switch (type) {
                case 'send_message' :
                    var user_id = result['user_id'];
                    var message = result['message'];
                    var room_id = result['room_id'];

                    if (this.room_id == room_id) {
                        
                        var receive_message = '';
                        
                        if (this.last_message_id == '' || this.last_message_id != user_id) {
                            this.last_message_id = user_id;
                            if (user_id == this.user_id) {
                                receive_message = "<li class='message_id'>[" + user_id + "]</li>";
                            } else {
                                receive_message = "<li class='message_id'>[" + user_id + "]</li>";
                            }
                        }

                        receive_message+= "<li class='message_text'>" + message + "</li>";
                        
                        // 메세지 로드
                        this.addMessage(receive_message);
                        
                        // 스크롤 아래로
                        $(".message_content").scrollTop($(".message_content")[0].scrollHeight);
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
    data() {
        return {
            'user_id' : '',
            'message_content' : '',
            'client_count' :'',
            'datetime' : '',
            'last_message_id' : '',
            'account' : ''
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
            asyncRequest({
                url: '/homepage/ajax/send_message',
                data: {
                    room_id: this.room_id,
                    message: message,
                    user_id: this.user_id
                },
                success: (result) => {
                    $('.message').val('');
                }
            });
        },
        addMessage : function(message) {
            this.message_content+= message;
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
