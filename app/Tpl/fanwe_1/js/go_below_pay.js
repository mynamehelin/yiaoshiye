$(document).ready(function(){

});

function bind_pay_form()
{
	$(".pay_form").find(".button_input").bind("click",function(){
		$(".pay_form").submit();
	});
	$(".pay_form").bind("submit",function(){		
		if($.trim($(this).find("input[name='money_off']").val())=="" || parseFloat($(this).find("input[name='money_off']").val())<=0)
		{
			
			$.showErr("请输入金额");
			return false;
		}
		if($(this).find("input[name='off_way']").val())=="")
		{
			$.showErr("请选择支付方式");
			return false;
		}
		else
		{
 			if(payType==1){
				show_tg_tip();
			}else{
				show_pay_tip();
			}
			
			return true;
		}
	});
}


