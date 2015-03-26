function Popup(){
    this.open = function(id, title, content, cmd, width){
        if ($('#' + id).length != 0){
            $('#' + id).remove();
        }   
        $('body:first').append(content);
        $('#' + id + ' .popup-close').click(function(){
            popup.close(id);
        });
        if(cmd){
            $('#' + id + ' .panel-body').append('<div class="row"><div class="col-lg-12"></div></div>');
            for(var i=0; i<cmd.length; i++){
                $('#' + id + ' .col-lg-12').last().append('<button class="btn btn-default pull-right" type="button" id="popCmd_'+id+'_'+i+'">'+cmd[i].title+'</button>');
                $('#'+'popCmd_'+id+'_'+i).click(cmd[i].fn);
            }
        }
        
        //$('#' + id).draggable({
            //handle: $('#' + id + ' .panel-heading')
        //});
        
        $('#' + id).show('slide',{direction: 'right'}, 1000);
		$('#' + id).show();
        shadow.show();
        this.resetPos();
    }
    
    this.close = function(id){
        //$('#'+id).hide('slide',{direction: 'right'}, 1000, function(){$('#'+id).remove()});
		$('#'+id).hide();
        shadow.hide();
    }
    
    this.resetPos = function(){
        $('.popup-form').each(function(){
            var docWidth = $(window).width();
            var docHeight = $(window).height();
            var popWidth = $(this).width();
            var popHeight = $(this).height();
            if($(this).height() > 400)
                $(this).css('top', 50);
            else
                $(this).css('margin-top', -($(this).height()/2));
            $(this).css('left', (docWidth-(popWidth))/2);
            $(this).css('max-height',$(window).height() - 200);
            $(this).css('max-width',$(window).width() - 200);
        });
    }
    
    this.msg = function(msg){
        this.open('msg-form', 'Message', '<form id="msg-form" role="form" class="popup-form" style="width: 500px;top:100">\
                        <div class="col-lg-12">\
                            <div class="panel panel-default">\
                                <div class="panel-heading">\
                                    '+msg+'\
                                </div>\
                                <div class="panel-body">\
                                </div>\
                            </div>\
                            <!-- /.panel -->\
                        </div>\
                    </form>', 
        [{
            title:"Close",
            fn:function(){
                popup.close('msg-form');
            }
        }]);
    }
    
    this.confirm = function(msg, fn){
        this.open('confirm-form', 'Confirm', '<form id="confirm-form" role="form" class="popup-form" style="width: 500px;top:100">\
                        <div class="col-lg-12">\
                            <div class="panel panel-default">\
                                <div class="panel-heading">\
                                    '+msg+'\
                                </div>\
                                <div class="panel-body">\
                                </div>\
                            </div>\
                            <!-- /.panel -->\
                        </div>\
                    </form>', 
            [{
            title:"Yes",
            fn:function(){
                fn();
                popup.close('confirm-form');
            }
        },{
            title:'Cancel',
            fn:function(){
                popup.close('confirm-form');
            }
        }]);
    }
}

function Loading(){
    this.show = function(){
        if ($('#loading').length == 0)
            $('body:first').append('<div id="loading" class="loading"><span class="loading-img"></span><span class="loading-text">Vui lòng chờ trong giây lát!</span></div>');
        $('#loading').fadeIn();
        shadow.show();
    }
    this.hide = function(){
        $('#loading').fadeOut();
        shadow.hide();
    }
}

function Shadow(){
    this.show = function(){
        if ($('#shadow').length == 0)
            $('body:first').append('<div id="shadow" class="bg-overlay"></div>');
        $('#shadow').show();
    }
    this.hide = function(){
        $('#shadow').hide();
    }
}

function Text(){
    this.subString = function(length, source){
        if(source.length>length)
            return source.substring(0, length)+'...';
        else
            return source;
    }
}

var shadow = new Shadow();
var loading = new Loading();
var popup = new Popup();
var text = new Text();