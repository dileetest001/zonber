<template>
    <div>
        <title>{{ room_id }} - {{ coinone_krw }}</title>
        <div class='hidden-xs'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>{{ room_id }}</th>
                        <th>파이넥스 USD</th>
                        <th>파이넥스 KRW</th>
                        <th>빗썸 USD</th>
                        <th>빗썸 KRW</th>
                        <th>코인원 USD</th>
                        <th>코인원 KRW</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class='bitfinex'>${{ bitfinex_usd }}</td>
                        <td class='bitfinex'>￦{{ bitfinex_krw }}</td>
                        <td class='bithumb'>${{ bithumb_usd }}</td>
                        <td class='bithumb'>￦{{ bithumb_krw }}</td>
                        <td class='coinone'>${{ coinone_usd }}</td>
                        <td class='coinone'>￦{{ coinone_krw }}</td>
                    </tr>
                    <tr>
                        <td class='premium' colspan=2></td>
                        <td class='premium'>프리미엄</td>
                        <td class='premium'>${{ bithumb_premium_usd }} (<span>{{ bithumb_premium_usd_percent }}%</span>)</td>
                        <td class='premium'>￦{{ bithumb_premium_krw }} (<span>{{ bithumb_premium_krw_percent }}%</span>)</td>
                        <td class='premium'>${{ coinone_premium_usd }} (<span>{{ coinone_premium_usd_percent }}%</span>)</td>
                        <td class='premium'>￦{{ coinone_premium_krw }} (<span>{{ coinone_premium_krw_percent }}%</span>)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class='visible-xs-* hidden-md hidden-lg hidden-sm'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>파이넥스</th>
                        <th>빗썸</th>
                        <th>코인원</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='bitfinex'>${{ bitfinex_usd }}</td>
                        <td class='bithumb'>￦{{ bithumb_krw }}</td>
                        <td class='coinone'>￦{{ coinone_krw }}</td>
                    </tr>
                    <tr>
                        <td class='premium'>프리미엄</td>
                        <td class='premium'>￦{{ bithumb_premium_krw }} (<span class="percent">{{ bithumb_premium_krw_percent }}%</span>)</td>
                        <td class='premium'>￦{{ coinone_premium_krw }} (<span class="percent">{{ coinone_premium_krw_percent }}%</span>)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class='iframe_div' v-html='iframe'>
        </div>
        
    </div>
</template>

<style scoped>
table {
    border : 1px solid #bb504e;
}
th, td {
    padding : 15px;
    text-align : right;
}

.iframe_div {
    height:480px;
}

.bitfinex {
    color:black;
}

.bithumb {
    color:#f57723;
}

.coinone {
    color:#337ab7;
}
.premium {
    border : 1px solid #d8bdbd;
}
</style>

<script>
export default {
    created : function() {
        
        // 차트 iframe
        this.setChartIframe();
        
        this.getBitfinexInfo();
        this.getBithumbInfo();
        this.getCoinoneInfo();
            
    },
    mounted: function() {
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
            iframe : '',
            dolor  : 1075.26882,
        }
    },
    props: [
        'socket',
        'room_id'
    ],
    methods: {
        getBitfinexInfo : function() {
            var currency = this.room_id.toUpperCase()+'USD';
            setInterval(() => {
                asyncRequest({
                    url : '/homepage/ajax/get_coin_info',
                    data: {
                        currency : this.room_id,
                        trade_market : 1,
                    },
                    dataType : 'json',
                    success: (result) => {
                        this.bitfinex_usd = number_format(result.usd);
                        this.bitfinex_krw = number_format(result.krw);
                        this.bitfinex_usd_org = result.usd;
                        this.bitfinex_krw_org = result.krw;
                        
                        this.setBithumbPremium();
                        this.setCoinonePremium();
                    }
                });
                
            }, 1800);
        },
        getBithumbInfo : function() {
            var currency = this.room_id.toUpperCase();
            
            setInterval(() => {
            
                $.ajax({
                    type : 'GET',
                    url  : 'https://api.bithumb.com/public/orderbook/'+currency,
                    data : {},
                    dataType : 'json',
                    success: (result) => {
                        if (result.status === '0000') {
                            var price = result.data.asks[0].price;
                            
                            this.bithumb_usd = number_format(price/this.dolor);
                            this.bithumb_krw = number_format(price);
                            this.bithumb_usd_org = price/this.dolor;
                            this.bithumb_krw_org = price;
                            
                            this.setBithumbPremium();
                        }
                    }
                });

            }, 3600);
        },
        getCoinoneInfo : function() {
            var currency = this.room_id.toLowerCase();
            setInterval(() => {
                $.ajax({
                    type : 'GET',
                    url: 'https://api.coinone.co.kr/orderbook/',
                    data : {
                        'currency' : currency
                    },
                    dataType : 'json',
                    success: (result) => {
                        
                        if (result.errorCode === '0') {
                            var price = result.ask[0].price;
                            this.coinone_krw = number_format(price);
                            this.coinone_usd = number_format(price/this.dolor);
                            this.coinone_usd_org = price/this.dolor;
                            this.coinone_krw_org = price;
                            
                            this.setCoinonePremium();
                        }
                    }
                });
            }, 3600);
        },
        setBithumbPremium : function() {
            if (this.bitfinex_usd !== 'load..' && this.bithumb_usd !== 'load..') {
                this.bithumb_premium_usd = number_format(this.bithumb_usd_org - this.bitfinex_usd_org);
                this.bithumb_premium_krw  = number_format(this.bithumb_krw_org - this.bitfinex_krw_org);
                this.bithumb_premium_usd_percent = number_format((this.bithumb_usd_org - this.bitfinex_usd_org) / this.bitfinex_usd_org * 100, 2);
                this.bithumb_premium_krw_percent = number_format((this.bithumb_krw_org - this.bitfinex_krw_org) / this.bitfinex_krw_org * 100, 2);
                
                
            }
        },
        setCoinonePremium : function() {
            if (this.bitfinex_usd !== 'load..'  && this.coinone_usd !== 'load..') {
                this.coinone_premium_usd = number_format(this.coinone_usd_org - this.bitfinex_usd_org);
                this.coinone_premium_krw  = number_format(this.coinone_krw_org - this.bitfinex_krw_org);
                this.coinone_premium_usd_percent = number_format((this.coinone_usd_org - this.bitfinex_usd_org) / this.bitfinex_usd_org * 100, 2);
                this.coinone_premium_krw_percent = number_format((this.coinone_krw_org - this.bitfinex_krw_org) / this.bitfinex_krw_org * 100, 2);
            }
        },
        setChartIframe : function() {
            if (this.room_id == 'btc') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/btcusd/15m"></iframe>';
            } else if (this.room_id == 'bch') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/bchusd/15m"></iframe>';
            } else if (this.room_id == 'eth') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/ethusd/15m"></iframe>';
            } else if (this.room_id == 'etc') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/etcusd/15m"></iframe>';
            } else if (this.room_id == 'xrp') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/xrpusd/15m"></iframe>';
            } else if (this.room_id == 'ltc') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/ltcusd/15m"></iframe>';
            } else if (this.room_id == 'btg') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/btgusd/15m"></iframe>';
            } else if (this.room_id == 'zec') {
                this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/zecusd/15m"></iframe>';
            }
        }
    }
}
</script>
pt>