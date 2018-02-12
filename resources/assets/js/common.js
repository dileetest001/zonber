
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
