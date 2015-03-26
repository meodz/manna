//Init framework
framework = function(params){
    params = $.extend(params);
    framework.baseUrl = params.baseUrl;
    framework.assetsUrl = params.assetsUrl;
    framework.uploadUrl = params.uploadUrl;
    framework.templatePath = params.templatePath;
    framework.servicePath = params.servicePath;
    CKEDITOR_BASEPATH = framework.assetsUrl + '/ckeditor/';
}
    
//Navigate
framework.navigate = function(df){
    params = $(location).attr("hash").replace('#', '').split('/');
    if(params.length <= 1 && params[0] == ''){
        params = df.split('/');
    }
    framework.navigate.action(params);
    $(window).bind('hashchange', function() {
        params = $(location).attr("hash").replace('#', '').split('/');
        if(params.length <= 1 && params[0] == ''){
            params = df.split('/');
        }
        framework.navigate.action(params);
    });
}
    
framework.navigate.action = function(params){
    for(var i = params.length; i > 0; i--){
        try{
            var action = window[params[0]];
        }
        catch(err){}
        for(var j = 1; j < i; j++){
            try{
                action = action[params[j]];
            }
            catch(err){}
        }
        try{
            action(params);
            break;
        }
        catch(err){
            document.location = '#';
        }
    }
}

//Build template
framework.template = function(template, data){
    return new EJS({
        url: framework.templatePath + template
    }).render(data);
}

//Ajax call

framework.ajax = function(params){
    params = $.extend({
        async:true, 
        method:'get',
        loading: true
    }, params);
    if(params.loading)
        loading.show();
    $.ajax({
        url: framework.baseUrl + framework.servicePath + params.service,
        type: params.method,
        data: params.data,
        dataType: 'json',
        async: params.async,
        success:function(result){
            if(params.loading)
                loading.hide();
            if(!result.status && result.message == '-signin'){
                viewer = null;
                document.location = '#auth';
            }
            else{
                params.success(result);
            }
        },
        error:function(){
            if(params.loading)
                loading.hide();
            popup.msg('Có lỗi xảy ra trong quá trình truyền dữ liệu, xin hãy kiểm tra lại kết nối mạng!');
        }
    });
}

//Ajax submit form
framework.submit = function(params){
    para = {
        async:true,
        data:$('#'+params.id).serialize(), 
        success:function(result){
            if(result.status){
                params.success(result);
            }
            else{
                $('#'+params.id+' input, select, textarea').each(function(){
                    $(this).parent().removeClass('has-error');
                    $(this).next('.help-block').remove();
                    if($(this).attr('name') && result.data[$(this).attr('name').replace(/.*\[/,'').replace(/\].*/,'')]){
                        $(this).parent().addClass('has-error');
                        $(this).after('<p class="help-block">'+result.data[$(this).attr('name').replace(/.*\[/,'').replace(/\].*/,'')]+'</p>');
                    }
                });
                if(result.message){
                    popup.msg(result.message);
                }
                popup.resetPos();
            }
        }, 
        service: params.service, 
        method:'post'
    };
    framework.ajax(para);
}

//Ajax submit form
framework.submitWithFile = function(params){
    var action = framework.baseUrl + framework.servicePath + params.service;
    if (!$('#upload-iframe-submit').length)
        $('body').append('<iframe id="upload-iframe-submit" name="upload-iframe-submit" style="display:none" />');
    $('#'+params.id).attr('target', 'upload-iframe-submit');
    $('#'+params.id).attr('action', action);
    $('#'+params.id).attr('method', 'post');
    $('#'+params.id).attr('enctype', 'multipart/form-data');
    $('#'+params.id).submit();
    $('#upload-iframe-submit').load(function (){
        try{
            var result = $('#upload-iframe-submit').contents().find('body');
            result = $.parseJSON(result.text());
            if(params.loading)
                loading.hide();
            if(!result.status && result.message == '-signin'){
                viewer = null;
                document.location = '#auth';
            }
            if(result.status){
                params.success(result);
            }else{
                $('#'+params.id+' input, select, textarea').each(function(){
                    $(this).parent().removeClass('has-error');
                    $(this).parent().find('.help-block').remove();
                    if($(this).attr('name') && result.data[$(this).attr('name').replace(/.*\[/,'').replace(/\].*/,'')]){
                        $(this).parent().addClass('has-error');
                        $(this).after('<p class="help-block">'+result.data[$(this).attr('name').replace(/.*\[/,'').replace(/\].*/,'')]+'</p>');
                    }
                });
                if(result.message){
                    popup.msg(result.message);
                }
                popup.resetPos();
            }
        }
        catch(err){
            if(params.loading)
                loading.hide();
            popup.msg('Something error, please check internet connection!'+err);
        }
    });
}

framework.editor = function(id, options){
    var instance = CKEDITOR.instances[id];
    options = $.extend({
        filebrowserBrowseUrl : 'backend/file'
    }, options);
    if (instance) {
        CKEDITOR.remove(instance);
    }
    $('#'+id).ckeditor(function(){
        popup.resetPos();
    },options);
}

framework.initTime = function(obj){
    var dd = new Date(parseInt(obj*1000));
    return dd.getDate() + "/" + (dd.getMonth() + 1) + "/" + dd.getFullYear() + " " + dd.getHours() + ":" + dd.getMinutes();    
}