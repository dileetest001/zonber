
asyncData = {
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'POST'
}

asyncRequest = function(request) {
    if (request.isFile === true) {
        var dataSet = request.data || new FormData();
        dataSet.append("ts", + new Date());
    } else {
        var dataSet = request.data || {};
        dataSet.ts = + new Date();
    }
    
    var requestData = {
        headers: asyncData.headers,
        type: asyncData.type,
        url: request.url,
        data: dataSet,
        success: (result) => {
            if (typeof request.success != 'undefined') request.success(result);
        }
    }
    
    if (request.isFile === true) {
        requestData.contentType = false;
        requestData.processData = false;
    }

    $.ajax(requestData);
}


/**
 * PHP 함수 number_format 같이 천자리마다 ,를 자동으로 찍어줌
 * @param num number|string : 숫자
 * @param decimals int default 0 : 보여질 소숫점 자리숫
 * @param dec_point char default . : 소수점을 대체 표시할 문자
 * @param thousands_sep char default , : 천자리 ,를 대체 표시할 문자
 * @returns {string}
 */
number_format = function (num, decimals, dec_point, thousands_sep) {
    num = parseFloat(num);
    if(isNaN(num)) return '0';
 
    if(typeof(decimals) == 'undefined') decimals = 0;
    if(typeof(dec_point) == 'undefined') dec_point = '.';
    if(typeof(thousands_sep) == 'undefined') thousands_sep = ',';
    decimals = Math.pow(10, decimals);
 
    num = num * decimals;
    num = Math.round(num);
    num = num / decimals;
 
    num = String(num);
    var reg = /(^[+-]?\d+)(\d{3})/;
    var tmp = num.split('.');
    var n = tmp[0];
    var d = tmp[1] ? dec_point + tmp[1] : '';
 
    while(reg.test(n)) n = n.replace(reg, "$1"+thousands_sep+"$2");
 
    return n + d;
}