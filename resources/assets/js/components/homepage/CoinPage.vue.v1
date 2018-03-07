<template>
    <div>
        <div>
            <select id="select_coin" class="select_coin form-control input-sm" @change="changeCoinInfo">
                <option value='btc'>BTC / 비트코인</option>
                <option value='bch'>BCH / 비트코인 캐시</option>
                <option value='btg'>BTG / 비트코인 골드</option>
                <option value='eth'>ETH / 이더리움</option>
                <option value='etc'>ETC / 이더리움 클래식</option>
                <option value='xrp'>XRP / 리플</option>
                <option value='ltc'>LTC / 라이트 코인</option>
                <option value='qtum'>QTUM / 퀀텀</option>
                <option value='xmr'>XMR / 모네로</option>
                <option value='zec'>ZEC / 지캐시</option>
                <option value='eos'>EOS / 이오스</option>
                <option value='snt'>SNT / 스테이터스네트워크토큰</option>
                <option value='dash'>DASH / 대시</option>
                <option value='omg'>OMG / 오미세고</option>
                <option value='rep'>REP / 어거</option>
            </select>
            <br>
        </div>
        <!-- pc -->
        <div class='hidden-xs'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>{{ coin_name_upper }}</th>
                        <th colspan="2" class="bitfinex">파이넥스</th>
                        <th colspan="2" class="upbit">업비트</th>
                        <th colspan="2" class="bithumb">빗썸</th>
                        <th colspan="2" class="coinone">코인원</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img class="coin_image" v-bind:src="coin_image" alt="코인 이미지"/></td>
                        <td><div class='bitfinex'>${{ bitfinex_usd }}</div></td>
                        <td><div class='bitfinex'>￦{{ bitfinex_krw }}</div></td>
                        <td><div id="upbit_usd" ref="upbit_usd" class='upbit'>${{ upbit_usd }}</div></td>
                        <td><div id="upbit_krw" ref="upbit_krw" class='upbit'>￦{{ upbit_krw }}</div></td>
                        <td><div id="bithumb_usd" ref="bithumb_usd" class='bithumb'>${{ bithumb_usd }}</div></td>
                        <td><div id="bithumb_krw" ref="bithumb_krw" class='bithumb'>￦{{ bithumb_krw }}</div></td>
                        <td><div id="coinone_usd" ref="coinone_usd" class='coinone'>${{ coinone_usd }}</div></td>
                        <td><div id="coinone_krw" ref="coinone_krw" class='coinone'>￦{{ coinone_krw }}</div></td>
                    </tr>
                    <tr>
                        <td colspan=2> 1$ = {{ this.show_dollar }} </td>
                        <td>프리미엄</td>
                        <td><div class='premium'>${{ upbit_premium_usd }} (<span class="percent">{{ upbit_premium_usd_percent }}%</span>)</div></td>
                        <td><div class='premium'>￦{{ upbit_premium_krw }} (<span class="percent">{{ upbit_premium_krw_percent }}%</span>)</div></td>
                        <td><div class='premium'>${{ bithumb_premium_usd }} (<span class="percent">{{ bithumb_premium_usd_percent }}%</span>)</div></td>
                        <td><div class='premium'>￦{{ bithumb_premium_krw }} (<span class="percent">{{ bithumb_premium_krw_percent }}%</span>)</div></td>
                        <td><div class='premium'>${{ coinone_premium_usd }} (<span class="percent">{{ coinone_premium_usd_percent }}%</span>)</div></td>
                        <td><div class='premium'>￦{{ coinone_premium_krw }} (<span class="percent">{{ coinone_premium_krw_percent }}%</span>)</div></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- mobile -->
        <div class='visible-xs-* hidden-md hidden-lg hidden-sm'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th class="bitfinex">파이넥스</th>
                        <th class="upbit">업비트</th>
                        <th class="bithumb">빗썸</th>
                        <th class="coinone">코인원</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class='bitfinex'>${{ bitfinex_usd }}</div></td>
                        <td><div id="upbit_krw_mobile" ref="upbit_krw_mobile" class='upbit'>￦{{ upbit_krw }}</div></td>
                        <td><div id="bithumb_krw_mobile" ref="bithumb_krw_mobile" class='bithumb'>￦{{ bithumb_krw }}</div></td>
                        <td><div id="coinone_krw_mobile" ref="coinone_krw_mobile" class='coinone'>￦{{ coinone_krw }}</div></td>
                        
                    </tr>
                    <tr>
                        <td>프리미엄</td>
                        <td><div class='premium'>￦{{ upbit_premium_krw }} (<span class="percent">{{ upbit_premium_krw_percent }}%</span>)</div></td>
                        <td><div class='premium'>￦{{ bithumb_premium_krw }} (<span class="percent">{{ bithumb_premium_krw_percent }}%</span>)</div></td>
                        <td><div class='premium'>￦{{ coinone_premium_krw }} (<span class="percent">{{ coinone_premium_krw_percent }}%</span>)</div></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class='iframe_div' v-html='iframe'>
        </div>
        
        <div class="ad_info">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class='trade_market' id='trade_market'>
                        <b>거래소 링크</b>
                        <br>
                        <a href='https://www.bithumb.com/' target='_blank'>빗썸</a>
                        <a href='https://coinone.co.kr/' target='_blank'>코인원</a>
                        <a href='https://upbit.com/' target='_blank'>업비트</a>
                        <a href='https://www.gopax.co.kr/' target='_blank'>고팍스</a>
                        <a href='https://www.bitfinex.com/' target='_blank'>비트파이넥스</a>
                        <a href='https://cryptowat.ch/' target='_blank'>크립토왓</a>
                    </div>
                    <br>
                    <div>
                        <b><img class="coin_image" src="/image/xrp.png" alt="코인 이미지"/>리플 기부</b>
                        <br>
                        <span class="xrp_address" onclick="copyToClipboard(this.innerText);" v-html='account'></span>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="xrp_qrcode">
                        <img src="/image/xrp_qrcode.png" style="width:150px;" alt="리플 QRCODE"/>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<style>

.trade_market > a {
    text-decoration:none;
}
.ad_info {
    border : 1px solid #bb504e;
    text-align: center;
    vertical-align : middle;
}

table {
    border : 2px solid #bb504e;
}

th {
    text-align : center;
    font-size : 12px;
    font-weight: bold;
}
td {
    text-align : right;
    font-size : 12px;
    font-weight : bold;
}

.select_coin {
    border-color : blue;
}

.bitfinex {
    color : black;
    border : 1px solid #f5f8fa;
}

.bithumb {
    color : #f57723;
    border : 1px solid #f5f8fa;
}

.coinone {
    color:#337ab7;
    border : 1px solid #f5f8fa;
}

.upbit {
    color:#0062df;
    border : 1px solid #f5f8fa;
}

.premium {
    border : 1px solid #f5f8fa;
}

.bitfinex:hover, .bithumb:hover, .coinone:hover, .premium:hover, .upbit:hover {
    background-color : #d3d3d3;
}

.percent {
    color : #f31414;
}

.coin_image {
    width : 20px;
    height: 20px;
}


.change_border {
    -webkit-animation-name: change_bordor; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 0.5s; /* Safari 4.0 - 8.0 */
    animation-name: change_bordor;
    animation-duration: 0.5s;
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes change_bordor {
    from {border-color: red;}
    to {border-color: yellow;}
}

/* Standard syntax */
@keyframes change_bordor {
    from {border-color: red;}
    to {border-color: blue;}
}


@media (max-width: 720px) {
    .iframe_div {
        height:410px;
    }
    .xrp_qrcode {
        display : none;
    }
}
@media (min-width: 720px) and (max-width: 990px) {
    .iframe_div {
        height:500px;
    }
}
@media (min-width: 990px) {
    .iframe_div {
        height:500px;
    }
}
</style>

<script>

export default {
    created : function() {
        this.createdFunction();
    },
    mounted: function() {
        this.mountedFunction();
    },
    data() {
        return {
            bitfinex_usd                : 'load..',
            bitfinex_usd_org            : 0,
            bitfinex_krw                : 'load..',
            bitfinex_krw_org            : 0,

            bithumb_usd                 : 'load..',
            bithumb_usd_org             : 0,
            bithumb_premium_usd         : 'load..',
            bithumb_premium_usd_percent : 'load..',
            bithumb_krw                 : 'load..',
            bithumb_krw_org             : 0,
            bithumb_premium_krw         : 'load..',
            bithumb_premium_krw_percent : 'load..',

            coinone_usd                 : 'load..',
            coinone_usd_org             : 0,
            coinone_premium_usd         : 'load..',
            coinone_premium_usd_percent : 'load..',
            coinone_krw                 : 'load..',    
            coinone_krw_org             : 0,
            coinone_premium_krw         : 'load..',
            coinone_premium_krw_percent : 'load..',
            
            upbit_usd                 : 'load..',
            upbit_usd_org             : 0,
            upbit_premium_usd         : 'load..',
            upbit_premium_usd_percent : 'load..',
            upbit_krw                 : 'load..',    
            upbit_krw_org             : 0,
            upbit_premium_krw         : 'load..',
            upbit_premium_krw_percent : 'load..',
            
            iframe : '',
            dollar  : 0,
            show_dollar : 0,
            account : '',
            coin_image : '',
            coin_name : this.room_id,
            coin_name_upper : this.room_id.toUpperCase(),

            biffiex_interval_id : 0,
            bithumb_interval_id : 0,
            coinone_interval_id : 0,
            upbit_interval_id : 0,
        }
    },
    props: [
        'socket',
        'room_id'
    ],
    methods: {
        createdFunction : function() {
            // 환율 정보
            this.setRate();
            
            // 코인 주소
            this.setAccount();
            
            // 차트 iframe
            this.setChartIframe();
            
            this.coin_image = '/image/'+ this.coin_name +'.png';
            
            this.getBitfinexFromServer();
            this.getBithumbFromServer();
            this.getCoinoneFromServer();
            this.getUpbitFromServer();
            
            this.getBitfinexInfo();
            this.getBithumbInfo();
            this.getCoinoneInfo();
            this.getUpbitInfo();
        },
        mountedFunction : function() {
            
            // 애니메이션 이벤트
            var bithumb_usd_div = this.$refs.bithumb_usd;
            var bithumb_krw_div = this.$refs.bithumb_krw;
            var coinone_usd_div = this.$refs.coinone_usd;
            var coinone_krw_div = this.$refs.coinone_krw;
            var upbit_usd_div   = this.$refs.upbit_usd;
            var upbit_krw_div   = this.$refs.upbit_krw;
            
            var bithumb_krw_mobile_div = this.$refs.bithumb_krw_mobile;
            var coinone_krw_mobile_div = this.$refs.coinone_krw_mobile;
            var upbit_krw_mobile_div = this.$refs.upbit_krw_mobile;
            
            bithumb_usd_div.addEventListener('animationend', function() {
                    $('#bithumb_usd').removeClass('change_border');
                }, false);
            bithumb_krw_div.addEventListener('animationend', function() {
                    $('#bithumb_krw').removeClass('change_border');
                }, false);

            coinone_usd_div.addEventListener('animationend', function() {
                    $('#coinone_usd').removeClass('change_border');
                }, false);
            coinone_krw_div.addEventListener('animationend', function() {
                    $('#coinone_krw').removeClass('change_border');
                }, false);
                
            upbit_usd_div.addEventListener('animationend', function() {
                    $('#upbit_usd').removeClass('change_border');
                }, false);
            upbit_krw_div.addEventListener('animationend', function() {
                    $('#upbit_krw').removeClass('change_border');
                }, false);

                
            bithumb_krw_mobile_div.addEventListener('animationend', function() {
                    $('#bithumb_krw_mobile').removeClass('change_border');
                }, false);
            coinone_krw_mobile_div.addEventListener('animationend', function() {
                    $('#coinone_krw_mobile').removeClass('change_border');
                }, false);            
            upbit_krw_mobile_div.addEventListener('animationend', function() {
                    $('#upbit_krw_mobile').removeClass('change_border');
                }, false);            
        },
        getBitfinexFromServer : function() {
            asyncRequest({
                url : '/homepage/ajax/get_coin_info',
                data: {
                    currency : this.coin_name,
                    trade_market : 1,
                },
                dataType : 'json',
                success: (result) => {
                    if (typeof result.usd !== 'undefined') {
                        this.bitfinex_usd = number_format(result.usd, 2);
                        this.bitfinex_krw = number_format(result.krw);
                        this.bitfinex_usd_org = result.usd;
                        this.bitfinex_krw_org = result.krw;
                        
                        this.setBithumbPremium();
                        this.setCoinonePremium();
                    }
                }
            });
        },
        getBithumbFromServer : function() {
            asyncRequest({
                url : '/homepage/ajax/get_coin_info',
                data: {
                    currency : this.coin_name,
                    trade_market : 2,
                },
                dataType : 'json',
                success: (result) => {
                    if (typeof result.usd !== 'undefined') {
                        this.bithumb_usd = number_format(result.usd, 2);
                        this.bithumb_krw = number_format(result.krw);
                        this.bithumb_usd_org = result.usd;
                        this.bithumb_krw_org = result.krw;
                        
                        document.title = this.bithumb_krw+ " " +this.coin_name_upper+"/KRW";
                    }
                }
            });
        },
        getCoinoneFromServer : function() {
            asyncRequest({
                url : '/homepage/ajax/get_coin_info',
                data: {
                    currency : this.coin_name,
                    trade_market : 3,
                },
                dataType : 'json',
                success: (result) => {
                    if (typeof result.usd !== 'undefined') {
                        this.coinone_usd = number_format(result.usd, 2);
                        this.coinone_krw = number_format(result.krw);                    
                        this.coinone_usd_org = result.usd;
                        this.coinone_krw_org = result.krw;
                    }
                }
            });
        },
        getUpbitFromServer : function() {
            asyncRequest({
                url : '/homepage/ajax/get_coin_info',
                data: {
                    currency : this.coin_name,
                    trade_market : 4,
                },
                dataType : 'json',
                success: (result) => {
                    if (typeof result.usd !== 'undefined') {
                        this.upbit_usd = number_format(result.usd, 2);
                        this.upbit_krw = number_format(result.krw);                    
                        this.upbit_usd_org = result.usd;
                        this.upbit_krw_org = result.krw;
                    }
                }
            });
        },
        getBitfinexInfo : function() {
            this.biffiex_interval_id = setInterval(() => {
                this.getBitfinexFromServer();
            }, 3000);
        },
        getBithumbInfo : function() {
            var currency = this.coin_name.toUpperCase();
            
            this.bithumb_interval_id = setInterval(() => {
            
                $.ajax({
                    type : 'GET',
                    url  : 'https://api.bithumb.com/public/orderbook/'+currency,
                    data : {},
                    dataType : 'json',
                    success: (result) => {
                        
                        var this_coin_name = this.coin_name.toUpperCase();
                        if (currency != this_coin_name) {
                            return;
                        }
                        
                        if (result.status != '5500') {
                            var price = result.data.asks[0].price;
                            
                            this.bithumb_usd = number_format(price/this.dollar, 2);
                            this.bithumb_krw = number_format(price);
                            
                            // border 깜박임
                            if (this.bithumb_usd_org != price/this.dollar) {
                                $('#bithumb_usd').addClass('change_border');
                            }
                            if (this.bithumb_krw_org != price) {
                                $('#bithumb_krw').addClass('change_border');
                                $('#bithumb_krw_mobile').addClass('change_border');
                            }

                            this.bithumb_usd_org = price/this.dollar;
                            this.bithumb_krw_org = price;
                            
                            document.title = this.bithumb_krw+ " " +this.coin_name_upper+"/KRW";
                            
                            this.setBithumbPremium();
                        } else {
                            clearInterval(this.bithumb_interval_id);
                            this.bithumb_usd                 = 0;
                            this.bithumb_usd_org             = 0;
                            this.bithumb_premium_usd         = 0;
                            this.bithumb_premium_usd_percent = 0;
                            this.bithumb_krw                 = 0;
                            this.bithumb_krw_org             = 0;
                            this.bithumb_premium_krw         = 0;
                            this.bithumb_premium_krw_percent = 0;
                        }
                    },
                    error: (result) => {
                        clearInterval(this.bithumb_interval_id);
                        this.bithumb_usd                 = 0;
                        this.bithumb_usd_org             = 0;
                        this.bithumb_premium_usd         = 0;
                        this.bithumb_premium_usd_percent = 0;
                        this.bithumb_krw                 = 0;
                        this.bithumb_krw_org             = 0;
                        this.bithumb_premium_krw         = 0;
                        this.bithumb_premium_krw_percent = 0;
                    }
                });

            }, 2400);
        },
        getCoinoneInfo : function() {
            var currency = this.coin_name.toLowerCase();
            
            this.coinone_interval_id = setInterval(() => {
                $.ajax({
                    type : 'GET',
                    url: 'https://api.coinone.co.kr/orderbook/',
                    data : {
                        'currency' : currency
                    },
                    dataType : 'json',
                    success: (result) => {

                        var this_coin_name = this.coin_name.toLowerCase();
                        if (currency != this_coin_name) {
                            return;
                        }
                        
                        if (result.errorCode === '0' && result.currency == currency) {
                            var price = result.ask[0].price;
                            this.coinone_usd = number_format(price/this.dollar, 2);
                            this.coinone_krw = number_format(price);
                            
                            // border 깜박임
                            if (this.coinone_usd_org != price/this.dollar) {
                                $('#coinone_usd').addClass('change_border');
                            }
                            if (this.coinone_krw_org != price) {
                                $('#coinone_krw').addClass('change_border');
                                $('#coinone_krw_mobile').addClass('change_border');
                            }
                    
                            this.coinone_usd_org = price/this.dollar;
                            this.coinone_krw_org = price;
                            this.setCoinonePremium();
                        } else {
                            clearInterval(this.coinone_interval_id);
                            this.coinone_usd                 = 0;
                            this.coinone_usd_org             = 0;
                            this.coinone_premium_usd         = 0;
                            this.coinone_premium_usd_percent = 0;
                            this.coinone_krw                 = 0;
                            this.coinone_krw_org             = 0;
                            this.coinone_premium_krw         = 0;
                            this.coinone_premium_krw_percent = 0;
                        }
                    }
                });
            }, 2400);
        },
        getUpbitInfo : function() {
            var currency = this.coin_name.toUpperCase();
            if (currency == 'BCH') {
                currency = 'BCC';
            }                                 
            
            this.upbit_interval_id = setInterval(() => {
                $.ajax({
                    type : 'GET',
                    url: 'https://crix-api-endpoint.upbit.com/v1/crix/candles/minutes/1?code=CRIX.UPBIT.KRW-'+currency+'&count=1',
                    dataType : 'json',
                    success: (result) => {
                        
                        var this_coin_name = this.coin_name.toUpperCase();
                        if (this_coin_name == 'BCH') {
                            this_coin_name = 'BCC';
                        }
                        if (currency != this_coin_name) {
                            return;
                        }
                        
                        if (typeof result[0] != 'undefined' && result[0].code == 'CRIX.UPBIT.KRW-'+currency) {
                            
                            var price = result[0].tradePrice;

                            this.upbit_usd = number_format(price/this.dollar, 2);
                            this.upbit_krw = number_format(price);
                            
                            // border 깜박임
                            if (this.upbit_usd_org != price/this.dollar) {
                                $('#upbit_usd').addClass('change_border');
                            }
                            if (this.upbit_krw_org != price) {
                                $('#upbit_krw').addClass('change_border');
                                $('#upbit_krw_mobile').addClass('change_border');
                            }
                    
                            this.upbit_usd_org = price/this.dollar;
                            this.upbit_krw_org = price;
                            
                            this.setUpbitPremium();
                        } else {
                            clearInterval(this.upbit_interval_id);
                            this.upbit_usd                 = 0;
                            this.upbit_usd_org             = 0;
                            this.upbit_premium_usd         = 0;
                            this.upbit_premium_usd_percent = 0;
                            this.upbit_krw                 = 0;
                            this.upbit_krw_org             = 0;
                            this.upbit_premium_krw         = 0;
                            this.upbit_premium_krw_percent = 0;
                        }
                    }
                });
            }, 2400);
        },
        setBithumbPremium : function() {
            if (this.bitfinex_usd !== 'load..' && this.bithumb_usd !== 'load..' && this.bithumb_usd !== 0) {
                this.bithumb_premium_usd = number_format(this.bithumb_usd_org - this.bitfinex_usd_org, 2);
                this.bithumb_premium_krw  = number_format(this.bithumb_krw_org - this.bitfinex_krw_org);
                this.bithumb_premium_usd_percent = number_format((this.bithumb_usd_org - this.bitfinex_usd_org) / this.bitfinex_usd_org * 100, 2);
                this.bithumb_premium_krw_percent = number_format((this.bithumb_krw_org - this.bitfinex_krw_org) / this.bitfinex_krw_org * 100, 2);
            }
        },
        setCoinonePremium : function() {
            if (this.bitfinex_usd !== 'load..'  && this.coinone_usd !== 'load..' && this.coinone_usd !== 0) {
                this.coinone_premium_usd = number_format(this.coinone_usd_org - this.bitfinex_usd_org, 2);
                this.coinone_premium_krw  = number_format(this.coinone_krw_org - this.bitfinex_krw_org);
                this.coinone_premium_usd_percent = number_format((this.coinone_usd_org - this.bitfinex_usd_org) / this.bitfinex_usd_org * 100, 2);
                this.coinone_premium_krw_percent = number_format((this.coinone_krw_org - this.bitfinex_krw_org) / this.bitfinex_krw_org * 100, 2);
            }
        },
        setUpbitPremium : function() {
            if (this.bitfinex_usd !== 'load..'  && this.upbit_usd !== 'load..' && this.upbit_usd !== 0) {
                this.upbit_premium_usd = number_format(this.upbit_usd_org - this.bitfinex_usd_org, 2);
                this.upbit_premium_krw  = number_format(this.upbit_krw_org - this.bitfinex_krw_org);
                this.upbit_premium_usd_percent = number_format((this.upbit_usd_org - this.bitfinex_usd_org) / this.bitfinex_usd_org * 100, 2);
                this.upbit_premium_krw_percent = number_format((this.upbit_krw_org - this.bitfinex_krw_org) / this.bitfinex_krw_org * 100, 2);
            }
        },
        setChartIframe : function() {
            this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/'+this.coin_name+'usd/15m"></iframe>';
        },
        setAccount : function() {
            
            this.account = 'rN9qNpgnBaZwqCg8CvUZRPqCcPPY7wfWep <br> 1752738475';
            
            //if (this.coin_name == 'btc') {
            //    this.account = '3GavawtgH2CFKthH2EoswfxaMiiQh68Sjx';
            //} else if (this.coin_name == 'bch') {
            //    this.account = '3KWo7RVc99PGryiQRguDg8vFBJNcAjvtjR';
            //} else if (this.coin_name == 'eth') {
            //    this.account = '0x345fae7b1e8ba8928574325e3c20e5f8a52b5da8';
            //} else if (this.coin_name == 'etc') {
            //    this.account = '0xb65a305af59396f65f1c615fb9df1e934dcab48b';
            //} else if (this.coin_name == 'xrp') {
            //    this.account = 'rN9qNpgnBaZwqCg8CvUZRPqCcPPY7wfWep <br> 1752738475';
            //} else if (this.coin_name == 'ltc') {
            //    this.account = '3J3vtAJ1AkvxU5EZQS11q8awzKxAozxpdo';
            //} else if (this.coin_name == 'btg') {
            //    this.account = 'AZ9vxk6kxhCxkX5nGfmu85ayRCTsnAnHmR';
            //}
        },
        changeCoinInfo : function() {
            this.setInitData();
            this.createdFunction();
            this.mountedFunction();
        },
        setInitData : function() {
            this.coin_name = $('#select_coin').val();
            this.coin_name_upper = this.coin_name.toUpperCase();
            clearInterval(this.biffiex_interval_id);
            clearInterval(this.bithumb_interval_id);
            clearInterval(this.coinone_interval_id);
            clearInterval(this.upbit_interval_id);

            this.bitfinex_usd                = 'load..';
            this.bitfinex_usd_org            = 0;
            this.bitfinex_krw                = 'load..';
            this.bitfinex_krw_org            = 0;

            this.bithumb_usd                 = 'load..';
            this.bithumb_usd_org             = 0;
            this.bithumb_premium_usd         = 'load..';
            this.bithumb_premium_usd_percent = 'load..';
            this.bithumb_krw                 = 'load..';
            this.bithumb_krw_org             = 0;
            this.bithumb_premium_krw         = 'load..';
            this.bithumb_premium_krw_percent = 'load..';

            this.coinone_usd                 = 'load..';
            this.coinone_usd_org             = 0;
            this.coinone_premium_usd         = 'load..';
            this.coinone_premium_usd_percent = 'load..';
            this.coinone_krw                 = 'load..';
            this.coinone_krw_org             = 0,
            this.coinone_premium_krw         = 'load..';
            this.coinone_premium_krw_percent = 'load..';
            
            this.upbit_usd                 = 'load..';
            this.upbit_usd_org             = 0;
            this.upbit_premium_usd         = 'load..';
            this.upbit_premium_usd_percent = 'load..';
            this.upbit_krw                 = 'load..';
            this.upbit_krw_org             = 0;
            this.upbit_premium_krw         = 'load..';
            this.upbit_premium_krw_percent = 'load..';
        },
        setRate : function() {
            asyncRequest({
                url : '/homepage/ajax/get_rate_info',
                data: {
                },
                success: (result) => {
                    this.dollar = result.usd;
                    this.show_dollar = number_format(this.dollar, 2);
                }
            });
        }
    }
}
</script>
