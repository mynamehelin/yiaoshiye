/*top start*/
jQuery(document).ready(function($){
    var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 700,
        $back_to_top = $('.cd-top');
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) { 
            $back_to_top.addClass('cd-fade-out');
        }
    });
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
            }, scroll_top_duration
        );
    });
    $(".nav").find('a').each(function(index, el) {        
        var now_href = $(this).attr('href');        
        if(location.href.indexOf(now_href)>0){
            $(this).addClass('active').parent().siblings('li').children('a').removeClass('active');            
        }
    });
    $("#floatTrigger").click(function() {
        $("#online_qq_layer").toggleClass("online_qq_on")
    });
});
$(function(){
    $(".addGuanzhu").click(function(event) {
        obj = $(this);
        var tid = $(this).attr('bid');
        $.ajax({
            url: "/project/addguanzhu.html",
            data: {"tid":tid},
            timeout: 5000,
            cache: false,
            type: "post",
            dataType: "json",
            success: function (d, s, r) {   
            obj.children('label').text(d.has_guanzhu);
               layer.alert(d.message, 1,!1);           
            }
        });
    });
 });
var addTimer = function () {
    var list = [],
        interval;
    return function (id, time) {
        if (!interval)
            interval = setInterval(go, 1000);
        list.push({ ele: document.getElementById(id), time: time });
    }
    function go() {
        for (var i = 0; i < list.length; i++) {
            list[i].ele.innerHTML = getTimerString(list[i].time ? list[i].time -= 1 : 0);
            if (!list[i].time)
                list.splice(i--, 1);
        }
    }
    function getTimerString(time) {
        var not0 = !!time,
            d = Math.floor(time / 86400),
            h = Math.floor((time %= 86400) / 3600),
            m = Math.floor((time %= 3600) / 60),
            s = time % 60;                
        if (not0&&time>0)
            return "" + d + "天" + h + "小时" + m + "分" + s + "秒";
        else return "";
    }
} ();

//判断浏览器是否支持 placeholder属性  
function isPlaceholder(){  
    var input = document.createElement('input');  
    return 'placeholder' in input;  
}  
if (!isPlaceholder()) {//不支持placeholder 用jquery来完成  
    $(document).ready(function() {  
        if(!isPlaceholder()){  
            $("input").not("input[type='password']").each(//把input绑定事件 排除password框  
                function(){  
                    if($(this).val()=="" && $(this).attr("placeholder")!="" && $(this).attr("placeholder")!="undefined"){  
                        $(this).val($(this).attr("placeholder")).css('color', '#A9A9A9');  
                        $(this).focus(function(){  
                            if($(this).val()==$(this).attr("placeholder")) $(this).val("").css('color', '#000');
                        });  
                        $(this).blur(function(){  
                            if($(this).val()=="") {
                                $(this).val($(this).attr("placeholder")).css('color', '#A9A9A9');                               
                            }
                        });  
                    }  
            });
            //对password框的特殊处理1.创建一个text框 2获取焦点和失去焦点的时候切换  
            $("input[type=password]").each(function(index, el) {                   
                var pwdField  = $(this);
                if(pwdField.attr('placeholder')){
                    var pwdVal  = pwdField.attr('placeholder');  
                    var class_attr = pwdField.attr('class');                                 
                    var id = pwdField.attr('id')+'tmp';
                    pwdField.after('<input id="'+id+'" class="'+class_attr+'" type="text" value="'+pwdVal+'" autocomplete="off" style=" width:247px; height:38px; text-indent:5px; border:1px solid #e1e0e5;color:#ccc;" />');  
                    var pwdPlaceholder = $('#'+id);  
                    pwdPlaceholder.show();  
                    pwdField.hide();  
                    // alert('<input id="pwdPlaceholder" class="'+class_attr+'" type="text" value="'+pwdVal+'" autocomplete="off" style="color:#ccc;" />');
                      
                    pwdPlaceholder.focus(function(){
                        pwdPlaceholder.hide();  
                        pwdField.show();  
                        pwdField.focus();  
                    });
                      
                    pwdField.blur(function(){  
                        if(pwdField.val() == '') {  
                            pwdPlaceholder.show();  
                            pwdField.hide();  
                        }  
                    });                 
                }
            });
        }  
    });
}  
