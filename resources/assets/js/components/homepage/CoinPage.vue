<template>
    <div>

        <div class="col-lg-5 col-sm-12">
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th></th>
                        <th colspan="2" class="bitfinex">Finex($)</th>
                        <th colspan="2" class="upbit">Upbit(￦)</th>
                        <th colspan="2" class="bithumb">Bithumb(￦)</th>
                        <th colspan="2" class="coinone">Coinone(￦)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- BTC -->
                    <tr class="coin_tr" v-on:click="setChartIframe('btc')">
                        <td style="text-align:center;">BTC <img class="coin_image" src="/image/btc.png" alt="BTC"/></td>
                        <td colspan="2"><div id="bitfinex_btc" ref="bitfinex_btc">{{ btc.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_btc" ref="upbit_btc">{{ btc.upbit_krw }} <br><span class="percent">({{ btc.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_btc" ref="bithumb_btc">{{ btc.bithumb_krw }} <br><span class="percent">({{ btc.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_btc" ref="coinone_btc">{{ btc.coinone_krw }} <br><span class="percent">({{ btc.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- BCH -->
                    <tr class="coin_tr" v-on:click="setChartIframe('bch')">
                        <td style="text-align:center;">BCH <img class="coin_image" src="/image/bch.png" alt="BCH"/></td>
                        <td colspan="2"><div id="bitfinex_bch" ref="bitfinex_bch">{{ bch.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_bch" ref="upbit_bch">{{ bch.upbit_krw }} <br><span class="percent">({{ bch.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_bch" ref="bithumb_bch">{{ bch.bithumb_krw }} <br><span class="percent">({{ bch.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_bch" ref="coinone_bch">{{ bch.coinone_krw }} <br><span class="percent">({{ bch.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- BTG -->
                    <tr class="coin_tr" v-on:click="setChartIframe('btg')">
                        <td style="text-align:center;">BTG <img class="coin_image" src="/image/btg.png" alt="BTG"/></td>
                        <td colspan="2"><div id="bitfinex_btg" ref="bitfinex_btg">{{ btg.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_btg" ref="upbit_btg">{{ btg.upbit_krw }} <br><span class="percent">({{ btg.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_btg" ref="bithumb_btg">{{ btg.bithumb_krw }} <br><span class="percent">({{ btg.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_btg" ref="coinone_btg">{{ btg.coinone_krw }} <br><span class="percent">({{ btg.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- ETH -->
                    <tr class="coin_tr" v-on:click="setChartIframe('eth')">
                        <td style="text-align:center;">ETH <img class="coin_image" src="/image/eth.png" alt="ETH"/></td>
                        <td colspan="2"><div id="bitfinex_eth" ref="bitfinex_eth">{{ eth.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_eth" ref="upbit_eth">{{ eth.upbit_krw }} <br><span class="percent">({{ eth.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_eth" ref="bithumb_eth">{{ eth.bithumb_krw }} <br><span class="percent">({{ eth.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_eth" ref="coinone_eth">{{ eth.coinone_krw }} <br><span class="percent">({{ eth.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- ETC -->
                    <tr class="coin_tr" v-on:click="setChartIframe('etc')">
                        <td style="text-align:center;">ETC <img class="coin_image" src="/image/etc.png" alt="ETC"/></td>
                        <td colspan="2"><div id="bitfinex_etc" ref="bitfinex_etc">{{ etc.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_etc" ref="upbit_etc">{{ etc.upbit_krw }} <br><span class="percent">({{ etc.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_etc" ref="bithumb_etc">{{ etc.bithumb_krw }} <br><span class="percent">({{ etc.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_etc" ref="coinone_etc">{{ etc.coinone_krw }} <br><span class="percent">({{ etc.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- XRP -->
                    <tr class="coin_tr" v-on:click="setChartIframe('xrp')">
                        <td style="text-align:center;">XRP <img class="coin_image" src="/image/xrp.png" alt="XRP"/></td>
                        <td colspan="2"><div id="bitfinex_xrp" ref="bitfinex_xrp">{{ xrp.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_xrp" ref="upbit_xrp">{{ xrp.upbit_krw }} <br><span class="percent">({{ xrp.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_xrp" ref="bithumb_xrp">{{ xrp.bithumb_krw }} <br><span class="percent">({{ xrp.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_xrp" ref="coinone_xrp">{{ xrp.coinone_krw }} <br><span class="percent">({{ xrp.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- LTC -->
                    <tr class="coin_tr" v-on:click="setChartIframe('ltc')">
                        <td style="text-align:center;">LTC <img class="coin_image" src="/image/ltc.png" alt="LTC"/></td>
                        <td colspan="2"><div id="bitfinex_ltc" ref="bitfinex_ltc">{{ ltc.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_ltc" ref="upbit_ltc">{{ ltc.upbit_krw }} <br><span class="percent">({{ ltc.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_ltc" ref="bithumb_ltc">{{ ltc.bithumb_krw }} <br><span class="percent">({{ ltc.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_ltc" ref="coinone_ltc">{{ ltc.coinone_krw }} <br><span class="percent">({{ ltc.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- QTUM -->
                    <tr class="coin_tr" v-on:click="setChartIframe('qtum')">
                        <td style="text-align:center;">QTUM <img class="coin_image" src="/image/qtum.png" alt="QTUM"/></td>
                        <td colspan="2"><div id="bitfinex_qtum" ref="bitfinex_qtum">{{ qtum.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_qtum" ref="upbit_qtum">{{ qtum.upbit_krw }} <br><span class="percent">({{ qtum.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_qtum" ref="bithumb_qtum">{{ qtum.bithumb_krw }} <br><span class="percent">({{ qtum.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_qtum" ref="coinone_qtum">{{ qtum.coinone_krw }} <br><span class="percent">({{ qtum.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- NEO -->
                    <tr class="coin_tr" v-on:click="setChartIframe('neo')">
                        <td style="text-align:center;">NEO <img class="coin_image" src="/image/neo.png" alt="NEO"/></td>
                        <td colspan="2"><div id="bitfinex_neo" ref="bitfinex_neo">{{ neo.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_neo" ref="upbit_neo">{{ neo.upbit_krw }} <br><span class="percent">({{ neo.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_neo" ref="bithumb_neo">{{ neo.bithumb_krw }} <br><span class="percent">({{ neo.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_neo" ref="coinone_neo">{{ neo.coinone_krw }} <br><span class="percent">({{ neo.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- XMR -->
                    <tr class="coin_tr" v-on:click="setChartIframe('xmr')">
                        <td style="text-align:center;">XMR <img class="coin_image" src="/image/xmr.png" alt="XMR"/></td>
                        <td colspan="2"><div id="bitfinex_xmr" ref="bitfinex_xmr">{{ xmr.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_xmr" ref="upbit_xmr">{{ xmr.upbit_krw }} <br><span class="percent">({{ xmr.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_xmr" ref="bithumb_xmr">{{ xmr.bithumb_krw }} <br><span class="percent">({{ xmr.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_xmr" ref="coinone_xmr">{{ xmr.coinone_krw }} <br><span class="percent">({{ xmr.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- ZEC -->
                    <tr class="coin_tr" v-on:click="setChartIframe('zec')">
                        <td style="text-align:center;">ZEC <img class="coin_image" src="/image/zec.png" alt="ZEC"/></td>
                        <td colspan="2"><div id="bitfinex_zec" ref="bitfinex_zec">{{ zec.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_zec" ref="upbit_zec">{{ zec.upbit_krw }} <br><span class="percent">({{ zec.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_zec" ref="bithumb_zec">{{ zec.bithumb_krw }} <br><span class="percent">({{ zec.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_zec" ref="coinone_zec">{{ zec.coinone_krw }} <br><span class="percent">({{ zec.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- EOS -->
                    <tr class="coin_tr" v-on:click="setChartIframe('eos')">
                        <td style="text-align:center;">EOS <img class="coin_image" src="/image/eos.png" alt="EOS"/></td>
                        <td colspan="2"><div id="bitfinex_eos" ref="bitfinex_eos">{{ eos.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_eos" ref="upbit_eos">{{ eos.upbit_krw }} <br><span class="percent">({{ eos.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_eos" ref="bithumb_eos">{{ eos.bithumb_krw }} <br><span class="percent">({{ eos.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_eos" ref="coinone_eos">{{ eos.coinone_krw }} <br><span class="percent">({{ eos.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- SNT -->
                    <tr class="coin_tr" v-on:click="setChartIframe('snt')">
                        <td style="text-align:center;">SNT <img class="coin_image" src="/image/snt.png" alt="SNT"/></td>
                        <td colspan="2"><div id="bitfinex_snt" ref="bitfinex_snt">{{ snt.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_snt" ref="upbit_snt">{{ snt.upbit_krw }} <br><span class="percent">({{ snt.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_snt" ref="bithumb_snt">{{ snt.bithumb_krw }} <br><span class="percent">({{ snt.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_snt" ref="coinone_snt">{{ snt.coinone_krw }} <br><span class="percent">({{ snt.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- DASH -->
                    <tr class="coin_tr" v-on:click="setChartIframe('dash')">
                        <td style="text-align:center;">DASH <img class="coin_image" src="/image/dash.png" alt="DASH"/></td>
                        <td colspan="2"><div id="bitfinex_dash" ref="bitfinex_dash">{{ dash.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_dash" ref="upbit_dash">{{ dash.upbit_krw }} <br><span class="percent">({{ dash.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_dash" ref="bithumb_dash">{{ dash.bithumb_krw }} <br><span class="percent">({{ dash.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_dash" ref="coinone_dash">{{ dash.coinone_krw }} <br><span class="percent">({{ dash.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- OMG -->
                    <tr class="coin_tr" v-on:click="setChartIframe('omg')">
                        <td style="text-align:center;">OMG <img class="coin_image" src="/image/omg.png" alt="OMG"/></td>
                        <td colspan="2"><div id="bitfinex_omg" ref="bitfinex_omg">{{ omg.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_omg" ref="upbit_omg">{{ omg.upbit_krw }} <br><span class="percent">({{ omg.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_omg" ref="bithumb_omg">{{ omg.bithumb_krw }} <br><span class="percent">({{ omg.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_omg" ref="coinone_omg">{{ omg.coinone_krw }} <br><span class="percent">({{ omg.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                    <!-- REP -->
                    <tr class="coin_tr" v-on:click="setChartIframe('rep')">
                        <td style="text-align:center;">REP <img class="coin_image" src="/image/rep.png" alt="REP"/></td>
                        <td colspan="2"><div id="bitfinex_rep" ref="bitfinex_rep">{{ rep.bitfinex_usd }}</div></td>
                        <td colspan="2"><div id="upbit_rep" ref="upbit_rep">{{ rep.upbit_krw }} <br><span class="percent">({{ rep.upbit_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="bithumb_rep" ref="bithumb_rep">{{ rep.bithumb_krw }} <br><span class="percent">({{ rep.bithumb_premium_krw_percent }}%)</span></div></td>
                        <td colspan="2"><div id="coinone_rep" ref="coinone_rep">{{ rep.coinone_krw }} <br><span class="percent">({{ rep.coinone_premium_krw_percent }}%)</span></div></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        
        <div class="col-lg-7 col-xs-12">
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
                            <b><img class="coin_image" src="/image/xrp.png" alt="코인 이미지"/>리플 기부</b><br>
                            <span onclick="copyToClipboard(this.innerText);">rN9qNpgnBaZwqCg8CvUZRPqCcPPY7wfWep</span><br>
                            <span onclick="copyToClipboard(this.innerText);">1752738475</span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="xrp_qrcode">
                            <img src="/image/xrp_qrcode.png" style="width:120px;" alt="리플 QRCODE"/>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12">
                        <hr>
                        <span>각 코인 정보를 클릭하면 차트가 갱신됩니다.</span><br>
                        <span>1USD = <span style="color:black;">{{ USD }}</span> / 1JPY = <span style="color:black;">{{ JPY }}</span></span><br>
                        <span>*API에 따라 반영이 느릴수 있습니다.</span>
                    </div>
                </div>
            </div>
            <br>
            <div class='iframe_div' v-html='iframe'>
            </div>
        </div>
        
    </div>
</template>

<style>


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


.bitfinex {
    color : black;
}

.bithumb {
    color : #f57723;
}

.coinone {
    color:#337ab7;
}

.upbit {
    color:#0062df;
}

.premium {
    border : 1px solid #f5f8fa;
}

.coin_tr:hover {
    background-color : #d3d3d3;
}

.percent {
    color : #f31414;
}

.coin_image {
    width : 20px;
    height: 20px;
}

.trade_market > a {
    text-decoration:none;
}
.ad_info {
    border : 1px solid #bb504e;
    text-align: center;
    vertical-align : middle;
}


.change_border {
    -webkit-animation-name: change_bordor; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 0.5s; /* Safari 4.0 - 8.0 */
    animation-name: change_bordor;
    animation-duration: 0.5s;
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes change_bordor {
    from {border: 0.2px solid blue;}
    to {border: 0px solid  red;}
}

/* Standard syntax */
@keyframes change_bordor {
    from {border: 0.2px solid blue;}
    to {border: 0px solid  red;}
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
    methods: {
        createdFunction : function() {
            // 코인 정보
            this.getCoinInfo();
            // 환율 정보
            this.getRateInfo();
        },
        mountedFunction : function() {
            // 애니메이션 이벤트
            this.setAnimationEndEvent();
        },
        getRateInfo : function() {
            setInterval(() => {
                asyncRequest({
                    url : '/homepage/ajax/get_rate_info',
                    data: {
                    },
                    success: (result) => {
                        this.USD = number_format(result.usd, 2);
                        this.JPY = number_format(result.jpy, 2);
                    }
                });
            }, 6000);
        },
        setChartIframe : function(coin_name) {
            this.iframe = '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/'+coin_name+'usd/15m"></iframe>';
        },
        getCoinInfo : function() {
            setInterval(() => {
                asyncRequest({
                    url : '/homepage/ajax/get_coin_info',
                    data: {
                    },
                    dataType : 'json',
                    success: (result) => {
                        $.each(result, (coin_name, value) => {
                            $.each(value, (trade_market, price) => {

                                switch (trade_market) {
                                    case '1' :
                                        if (price.usd > 0) {
                                            // border 깜박임
                                            if (this[coin_name].bitfinex_usd_org != price.usd) {
                                                $('#bitfinex_'+coin_name).addClass('change_border');
                                            }

                                            this[coin_name].bitfinex_usd = number_format(price.usd, 2);
                                            this[coin_name].bitfinex_krw = number_format(price.krw);
                                            this[coin_name].bitfinex_usd_org = price.usd;
                                            this[coin_name].bitfinex_krw_org = price.krw;
                                        } 
                                        
                                        break;
                                    case '2' :
                                        if (price.usd > 0) {
                                            // border 깜박임
                                            if (this[coin_name].bithumb_krw_org != price.krw) {
                                                $('#bithumb_'+coin_name).addClass('change_border');
                                            }

                                            this[coin_name].bithumb_usd = number_format(price.usd, 2);
                                            this[coin_name].bithumb_krw = number_format(price.krw);                                            
                                            this[coin_name].bithumb_usd_org = price.usd;
                                            this[coin_name].bithumb_krw_org = price.krw;
                                            this.setBithumbPremium(coin_name);
                                        } else {
                                            $('#bithumb_'+coin_name).remove();
                                        }
                                        
                                        break;
                                    case '3' :
                                        if (price.usd > 0) {
                                            // border 깜박임
                                            if (this[coin_name].coinone_krw_org != price.krw) {
                                                $('#coinone_'+coin_name).addClass('change_border');
                                            }
                                            
                                            this[coin_name].coinone_usd = number_format(price.usd, 2);
                                            this[coin_name].coinone_krw = number_format(price.krw);
                                            this[coin_name].coinone_usd_org = price.usd;
                                            this[coin_name].coinone_krw_org = price.krw;
                                            this.setCoinonePremium(coin_name);
                                        } else {
                                            $('#coinone_'+coin_name).remove();
                                        }
                                        
                                        break;
                                    case '4' :
                                        if (price.usd > 0) {
                                            
                                            // border 깜박임
                                            if (this[coin_name].upbit_krw_org != price.krw) {
                                                $('#upbit_'+coin_name).addClass('change_border');
                                            }
                                            
                                            this[coin_name].upbit_usd = number_format(price.usd, 2);
                                            this[coin_name].upbit_krw = number_format(price.krw);
                                            this[coin_name].upbit_usd_org = price.usd;
                                            this[coin_name].upbit_krw_org = price.krw;
                                            this.setUpbitPremium(coin_name);
                                        } else {
                                            $('#upbit_'+coin_name).remove();
                                        }
                                        
                                        break;
                                    default :
                                        break;
                                }
                            });
                            
                        });
                    }
                });
            }, 3600);
        },
        setBithumbPremium : function(coin_name) {
            if (this[coin_name].bitfinex_usd !== 0 && this[coin_name].bithumb_usd !== 0 && this[coin_name].bithumb_usd !== 0) {
                this[coin_name].bithumb_premium_usd = number_format(this[coin_name].bithumb_usd_org - this[coin_name].bitfinex_usd_org, 2);
                this[coin_name].bithumb_premium_krw  = number_format(this[coin_name].bithumb_krw_org - this[coin_name].bitfinex_krw_org);
                this[coin_name].bithumb_premium_usd_percent = number_format((this[coin_name].bithumb_usd_org - this[coin_name].bitfinex_usd_org) / this[coin_name].bitfinex_usd_org * 100, 2);
                this[coin_name].bithumb_premium_krw_percent = number_format((this[coin_name].bithumb_krw_org - this[coin_name].bitfinex_krw_org) / this[coin_name].bitfinex_krw_org * 100, 2);
            }
        },
        setCoinonePremium : function(coin_name) {
            if (this[coin_name].bitfinex_usd !== 0  && this[coin_name].coinone_usd !== 0 && this[coin_name].coinone_usd !== 0) {
                this[coin_name].coinone_premium_usd = number_format(this[coin_name].coinone_usd_org - this[coin_name].bitfinex_usd_org, 2);
                this[coin_name].coinone_premium_krw  = number_format(this[coin_name].coinone_krw_org - this[coin_name].bitfinex_krw_org);
                this[coin_name].coinone_premium_usd_percent = number_format((this[coin_name].coinone_usd_org - this[coin_name].bitfinex_usd_org) / this[coin_name].bitfinex_usd_org * 100, 2);
                this[coin_name].coinone_premium_krw_percent = number_format((this[coin_name].coinone_krw_org - this[coin_name].bitfinex_krw_org) / this[coin_name].bitfinex_krw_org * 100, 2);
            }
        },
        setUpbitPremium : function(coin_name) {
            if (this[coin_name].bitfinex_usd !== 0  && this[coin_name].upbit_usd !== 0 && this[coin_name].upbit_usd !== 0) {
                this[coin_name].upbit_premium_usd = number_format(this[coin_name].upbit_usd_org - this[coin_name].bitfinex_usd_org, 2);
                this[coin_name].upbit_premium_krw  = number_format(this[coin_name].upbit_krw_org - this[coin_name].bitfinex_krw_org);
                this[coin_name].upbit_premium_usd_percent = number_format((this[coin_name].upbit_usd_org - this[coin_name].bitfinex_usd_org) / this[coin_name].bitfinex_usd_org * 100, 2);
                this[coin_name].upbit_premium_krw_percent = number_format((this[coin_name].upbit_krw_org - this[coin_name].bitfinex_krw_org) / this[coin_name].bitfinex_krw_org * 100, 2);
            }
        },
        setAnimationEndEvent : function() {
            
            // btc
            var bitfinex_btc_div = this.$refs.bitfinex_btc;
            bitfinex_btc_div.addEventListener('animationend', function() {
                    $('#bitfinex_btc').removeClass('change_border');
                }, false);
            var upbit_btc_div = this.$refs.upbit_btc;
            upbit_btc_div.addEventListener('animationend', function() {
                    $('#upbit_btc').removeClass('change_border');
                }, false);
            var bithumb_btc_div = this.$refs.bithumb_btc;
            bithumb_btc_div.addEventListener('animationend', function() {
                    $('#bithumb_btc').removeClass('change_border');
                }, false);
            var coinone_btc_div = this.$refs.coinone_btc;
            coinone_btc_div.addEventListener('animationend', function() {
                    $('#coinone_btc').removeClass('change_border');
                }, false);
            
            // bch
            var bitfinex_bch_div = this.$refs.bitfinex_bch;
            bitfinex_bch_div.addEventListener('animationend', function() {
                    $('#bitfinex_bch').removeClass('change_border');
                }, false);
            var upbit_bch_div = this.$refs.upbit_bch;
            upbit_bch_div.addEventListener('animationend', function() {
                    $('#upbit_bch').removeClass('change_border');
                }, false);
            var bithumb_bch_div = this.$refs.bithumb_bch;
            bithumb_bch_div.addEventListener('animationend', function() {
                    $('#bithumb_bch').removeClass('change_border');
                }, false);
            var coinone_bch_div = this.$refs.coinone_bch;
            coinone_bch_div.addEventListener('animationend', function() {
                    $('#coinone_bch').removeClass('change_border');
                }, false);
            
            // btg
            var bitfinex_btg_div = this.$refs.bitfinex_btg;
            bitfinex_btg_div.addEventListener('animationend', function() {
                    $('#bitfinex_btg').removeClass('change_border');
                }, false);
            var upbit_btg_div = this.$refs.upbit_btg;
            upbit_btg_div.addEventListener('animationend', function() {
                    $('#upbit_btg').removeClass('change_border');
                }, false);
            var bithumb_btg_div = this.$refs.bithumb_btg;
            bithumb_btg_div.addEventListener('animationend', function() {
                    $('#bithumb_btg').removeClass('change_border');
                }, false);
            var coinone_btg_div = this.$refs.coinone_btg;
            coinone_btg_div.addEventListener('animationend', function() {
                    $('#coinone_btg').removeClass('change_border');
                }, false);

            // eth
            var bitfinex_eth_div = this.$refs.bitfinex_eth;
            bitfinex_eth_div.addEventListener('animationend', function() {
                    $('#bitfinex_eth').removeClass('change_border');
                }, false);
            var upbit_eth_div = this.$refs.upbit_eth;
            upbit_eth_div.addEventListener('animationend', function() {
                    $('#upbit_eth').removeClass('change_border');
                }, false);
            var bithumb_eth_div = this.$refs.bithumb_eth;
            bithumb_eth_div.addEventListener('animationend', function() {
                    $('#bithumb_eth').removeClass('change_border');
                }, false);
            var coinone_eth_div = this.$refs.coinone_eth;
            coinone_eth_div.addEventListener('animationend', function() {
                    $('#coinone_eth').removeClass('change_border');
                }, false);

            // etc
            var bitfinex_etc_div = this.$refs.bitfinex_etc;
            bitfinex_etc_div.addEventListener('animationend', function() {
                    $('#bitfinex_etc').removeClass('change_border');
                }, false);
            var upbit_etc_div = this.$refs.upbit_etc;
            upbit_etc_div.addEventListener('animationend', function() {
                    $('#upbit_etc').removeClass('change_border');
                }, false);
            var bithumb_etc_div = this.$refs.bithumb_etc;
            bithumb_etc_div.addEventListener('animationend', function() {
                    $('#bithumb_etc').removeClass('change_border');
                }, false);
            var coinone_etc_div = this.$refs.coinone_etc;
            coinone_etc_div.addEventListener('animationend', function() {
                    $('#coinone_etc').removeClass('change_border');
                }, false);
                
            // xrp
            var bitfinex_xrp_div = this.$refs.bitfinex_xrp;
            bitfinex_xrp_div.addEventListener('animationend', function() {
                    $('#bitfinex_xrp').removeClass('change_border');
                }, false);
            var upbit_xrp_div = this.$refs.upbit_xrp;
            upbit_xrp_div.addEventListener('animationend', function() {
                    $('#upbit_xrp').removeClass('change_border');
                }, false);
            var bithumb_xrp_div = this.$refs.bithumb_xrp;
            bithumb_xrp_div.addEventListener('animationend', function() {
                    $('#bithumb_xrp').removeClass('change_border');
                }, false);
            var coinone_xrp_div = this.$refs.coinone_xrp;
            coinone_xrp_div.addEventListener('animationend', function() {
                    $('#coinone_xrp').removeClass('change_border');
                }, false);

            // ltc
            var bitfinex_ltc_div = this.$refs.bitfinex_ltc;
            bitfinex_ltc_div.addEventListener('animationend', function() {
                    $('#bitfinex_ltc').removeClass('change_border');
                }, false);
            var upbit_ltc_div = this.$refs.upbit_ltc;
            upbit_ltc_div.addEventListener('animationend', function() {
                    $('#upbit_ltc').removeClass('change_border');
                }, false);
            var bithumb_ltc_div = this.$refs.bithumb_ltc;
            bithumb_ltc_div.addEventListener('animationend', function() {
                    $('#bithumb_ltc').removeClass('change_border');
                }, false);
            var coinone_ltc_div = this.$refs.coinone_ltc;
            coinone_ltc_div.addEventListener('animationend', function() {
                    $('#coinone_ltc').removeClass('change_border');
                }, false);

            // qtum
            var bitfinex_qtum_div = this.$refs.bitfinex_qtum;
            bitfinex_qtum_div.addEventListener('animationend', function() {
                    $('#bitfinex_qtum').removeClass('change_border');
                }, false);
            var upbit_qtum_div = this.$refs.upbit_qtum;
            upbit_qtum_div.addEventListener('animationend', function() {
                    $('#upbit_qtum').removeClass('change_border');
                }, false);
            var bithumb_qtum_div = this.$refs.bithumb_qtum;
            bithumb_qtum_div.addEventListener('animationend', function() {
                    $('#bithumb_qtum').removeClass('change_border');
                }, false);
            var coinone_qtum_div = this.$refs.coinone_qtum;
            coinone_qtum_div.addEventListener('animationend', function() {
                    $('#coinone_qtum').removeClass('change_border');
                }, false);
                
            // neo
            var bitfinex_neo_div = this.$refs.bitfinex_neo;
            bitfinex_neo_div.addEventListener('animationend', function() {
                    $('#bitfinex_neo').removeClass('change_border');
                }, false);
            var upbit_neo_div = this.$refs.upbit_neo;
            upbit_neo_div.addEventListener('animationend', function() {
                    $('#upbit_neo').removeClass('change_border');
                }, false);
            var bithumb_neo_div = this.$refs.bithumb_neo;
            bithumb_neo_div.addEventListener('animationend', function() {
                    $('#bithumb_neo').removeClass('change_border');
                }, false);
            var coinone_neo_div = this.$refs.coinone_neo;
            coinone_neo_div.addEventListener('animationend', function() {
                    $('#coinone_neo').removeClass('change_border');
                }, false);

            // xmr
            var bitfinex_xmr_div = this.$refs.bitfinex_xmr;
            bitfinex_xmr_div.addEventListener('animationend', function() {
                    $('#bitfinex_xmr').removeClass('change_border');
                }, false);
            var upbit_xmr_div = this.$refs.upbit_xmr;
            upbit_xmr_div.addEventListener('animationend', function() {
                    $('#upbit_xmr').removeClass('change_border');
                }, false);
            var bithumb_xmr_div = this.$refs.bithumb_xmr;
            bithumb_xmr_div.addEventListener('animationend', function() {
                    $('#bithumb_xmr').removeClass('change_border');
                }, false);
            var coinone_xmr_div = this.$refs.coinone_xmr;
            coinone_xmr_div.addEventListener('animationend', function() {
                    $('#coinone_xmr').removeClass('change_border');
                }, false);

            // zec
            var bitfinex_zec_div = this.$refs.bitfinex_zec;
            bitfinex_zec_div.addEventListener('animationend', function() {
                    $('#bitfinex_zec').removeClass('change_border');
                }, false);
            var upbit_zec_div = this.$refs.upbit_zec;
            upbit_zec_div.addEventListener('animationend', function() {
                    $('#upbit_zec').removeClass('change_border');
                }, false);
            var bithumb_zec_div = this.$refs.bithumb_zec;
            bithumb_zec_div.addEventListener('animationend', function() {
                    $('#bithumb_zec').removeClass('change_border');
                }, false);
            var coinone_zec_div = this.$refs.coinone_zec;
            coinone_zec_div.addEventListener('animationend', function() {
                    $('#coinone_zec').removeClass('change_border');
                }, false);

            // eos
            var bitfinex_eos_div = this.$refs.bitfinex_eos;
            bitfinex_eos_div.addEventListener('animationend', function() {
                    $('#bitfinex_eos').removeClass('change_border');
                }, false);
            var upbit_eos_div = this.$refs.upbit_eos;
            upbit_eos_div.addEventListener('animationend', function() {
                    $('#upbit_eos').removeClass('change_border');
                }, false);
            var bithumb_eos_div = this.$refs.bithumb_eos;
            bithumb_eos_div.addEventListener('animationend', function() {
                    $('#bithumb_eos').removeClass('change_border');
                }, false);
            var coinone_eos_div = this.$refs.coinone_eos;
            coinone_eos_div.addEventListener('animationend', function() {
                    $('#coinone_eos').removeClass('change_border');
                }, false);

            // snt
            var bitfinex_snt_div = this.$refs.bitfinex_snt;
            bitfinex_snt_div.addEventListener('animationend', function() {
                    $('#bitfinex_snt').removeClass('change_border');
                }, false);
            var upbit_snt_div = this.$refs.upbit_snt;
            upbit_snt_div.addEventListener('animationend', function() {
                    $('#upbit_snt').removeClass('change_border');
                }, false);
            var bithumb_snt_div = this.$refs.bithumb_snt;
            bithumb_snt_div.addEventListener('animationend', function() {
                    $('#bithumb_snt').removeClass('change_border');
                }, false);
            var coinone_snt_div = this.$refs.coinone_snt;
            coinone_snt_div.addEventListener('animationend', function() {
                    $('#coinone_snt').removeClass('change_border');
                }, false);

            // dash
            var bitfinex_dash_div = this.$refs.bitfinex_dash;
            bitfinex_dash_div.addEventListener('animationend', function() {
                    $('#bitfinex_dash').removeClass('change_border');
                }, false);
            var upbit_dash_div = this.$refs.upbit_dash;
            upbit_dash_div.addEventListener('animationend', function() {
                    $('#upbit_dash').removeClass('change_border');
                }, false);
            var bithumb_dash_div = this.$refs.bithumb_dash;
            bithumb_dash_div.addEventListener('animationend', function() {
                    $('#bithumb_dash').removeClass('change_border');
                }, false);
            var coinone_dash_div = this.$refs.coinone_dash;
            coinone_dash_div.addEventListener('animationend', function() {
                    $('#coinone_dash').removeClass('change_border');
                }, false);
                
            // omg
            var bitfinex_omg_div = this.$refs.bitfinex_omg;
            bitfinex_omg_div.addEventListener('animationend', function() {
                    $('#bitfinex_omg').removeClass('change_border');
                }, false);
            var upbit_omg_div = this.$refs.upbit_omg;
            upbit_omg_div.addEventListener('animationend', function() {
                    $('#upbit_omg').removeClass('change_border');
                }, false);
            var bithumb_omg_div = this.$refs.bithumb_omg;
            bithumb_omg_div.addEventListener('animationend', function() {
                    $('#bithumb_omg').removeClass('change_border');
                }, false);
            var coinone_omg_div = this.$refs.coinone_omg;
            coinone_omg_div.addEventListener('animationend', function() {
                    $('#coinone_omg').removeClass('change_border');
                }, false);

            // rep
            var bitfinex_rep_div = this.$refs.bitfinex_rep;
            bitfinex_rep_div.addEventListener('animationend', function() {
                    $('#bitfinex_rep').removeClass('change_border');
                }, false);
            var upbit_rep_div = this.$refs.upbit_rep;
            upbit_rep_div.addEventListener('animationend', function() {
                    $('#upbit_rep').removeClass('change_border');
                }, false);
            var bithumb_rep_div = this.$refs.bithumb_rep;
            bithumb_rep_div.addEventListener('animationend', function() {
                    $('#bithumb_rep').removeClass('change_border');
                }, false);
            var coinone_rep_div = this.$refs.coinone_rep;
            coinone_rep_div.addEventListener('animationend', function() {
                    $('#coinone_rep').removeClass('change_border');
                }, false);
        }
    },
    data() {
        return {
            USD : 0,
            JPY : 0,
            iframe : '<iframe style="width:100%; height:100%;" src="https://embed.cryptowat.ch/bitfinex/btcusd/15m"></iframe>',
            btc : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            bch : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            btg : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            eth : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            etc : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            xrp : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            ltc : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            qtum : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            neo : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            xmr : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            zec : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            eos : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            snt : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            dash : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            omg : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
            rep : {
                bitfinex_usd                : 0,
                bitfinex_usd_org            : 0,
                bitfinex_krw                : 0,
                bitfinex_krw_org            : 0,

                bithumb_usd                 : 0,
                bithumb_usd_org             : 0,
                bithumb_premium_usd         : 0,
                bithumb_premium_usd_percent : 0,
                bithumb_krw                 : 0,
                bithumb_krw_org             : 0,
                bithumb_premium_krw         : 0,
                bithumb_premium_krw_percent : 0,

                coinone_usd                 : 0,
                coinone_usd_org             : 0,
                coinone_premium_usd         : 0,
                coinone_premium_usd_percent : 0,
                coinone_krw                 : 0,    
                coinone_krw_org             : 0,
                coinone_premium_krw         : 0,
                coinone_premium_krw_percent : 0,
                
                upbit_usd                 : 0,
                upbit_usd_org             : 0,
                upbit_premium_usd         : 0,
                upbit_premium_usd_percent : 0,
                upbit_krw                 : 0,    
                upbit_krw_org             : 0,
                upbit_premium_krw         : 0,
                upbit_premium_krw_percent : 0
            },
        }
    },
    props: [
        'socket',
    ]
}
</script><