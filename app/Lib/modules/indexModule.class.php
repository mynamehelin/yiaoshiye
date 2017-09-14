<?php
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(97139915@qq.com)
// +----------------------------------------------------------------------
require APP_ROOT_PATH.'app/Lib/shop_lip.php';
require APP_ROOT_PATH.'app/Lib/page.php';
class indexModule extends BaseModule
{

	public function articlex()
	{
		$id=38;

		if(!$id && isset($_REQUEST['bs'])){
			$bs=strim($_REQUEST['bs']);
			$id=$GLOBALS['article_cates_bs'][$bs];
		}

		$GLOBALS['tmpl']->assign("page_title","文章列表");
		//改写
		$g_links =get_link_by_id();
		$GLOBALS['tmpl']->assign("g_links",$g_links);
		$GLOBALS['tmpl']->caching = true;
		$artilce_cate = load_auto_cache("article_cates");
		$type_id=0;
		$cate_name='';
		$tag = strim($_REQUEST['tag']);  //标签
		foreach($artilce_cate as $k=>$v)
		{
			$artilce_cate[$k]['cate_id']=$v['id'];
			$artilce_cate[$k]['titles']=$v['title'];
			if($id>0&&$v['id']==$id){
				$type_id=intval($v['type_id']);
				$cate_name=$v['title'];
			}
			if($id==$artilce_cate[$k]['cate_id'])
			{
				$artilce_cate[$k]['current']=1;
			}

		}
		$GLOBALS['tmpl']->assign("cate_name",$cate_name);
		$GLOBALS['tmpl']->assign("artilce_cate",$artilce_cate);

		//分页
		$page_size = DEALUPDATE_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)
			$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
		//条件判断
		$where='1=1 and a.is_delete=0 and a.is_effect=1 and c.is_effect=1';
		if($id>0){
			$where.=' and c.type_id='.$type_id.'  and a.cate_id='.$id;
		}else{
			$where.=' and c.type_id=0 ';
		}
		if($tag!="")
		{
			$where.=" and (a.content like '%".$tag."%' or a.title like '%".$tag."%')";
		}
		$temp_artilce_list = $GLOBALS['db']->getAllCached("SELECT a.*,c.type_id,c.title as cate_name from ".DB_PREFIX."article a LEFT JOIN ".DB_PREFIX."article_cate c on a.cate_id=c.id where $where order by a.update_time desc limit 2");

		$artilce_item=array();
		foreach($temp_artilce_list as $k=>$v)
		{
			//最新智能头条type_id==0普通文章, type_id==1帮助文章，is_hot==1热门，is_week==1本周必读
			if($v['id']>0){
				$artilce_item[$k]['cate_title']=$v['title'];
				$artilce_item[$k]['seo_keyword']=$v['seo_keyword'];
				$artilce_item[$k]['title']=$v['title'];
				$artilce_item[$k]['content']=$v['content'];
				$artilce_item[$k]['update_time']=$v['update_time'];
				$artilce_item[$k]['brief']=$v['brief'];
				$artilce_item[$k]['cate_name']=$v['cate_name'];
				$artilce_item[$k]['writer']=$v['writer'];
				$artilce_item[$k]['icon']=$v['icon'];
				$artilce_item[$k]['tags_arr'] = preg_split("/[ ,]/",$v['tags']);
				$artilce_item[$k]['cate_url']=url('article_cate',array('id'=>$v['cate_id']));
				if($v['rel_url']=="")
					$artilce_item[$k]['url']=url('article',array('id'=>$v['id']));
				else
					$artilce_item[$k]['url']=$v['rel_url'];

			}

		}


		$GLOBALS['tmpl']->assign("artilce_list",$artilce_item);

	}
	public function gonggao()
	{
		$id=39;

		if(!$id && isset($_REQUEST['bs'])){
			$bs=strim($_REQUEST['bs']);
			$id=$GLOBALS['article_cates_bs'][$bs];
		}

		$GLOBALS['tmpl']->assign("page_title","文章列表");
		//改写
		$g_links =get_link_by_id();
		$GLOBALS['tmpl']->assign("g_links",$g_links);
		$GLOBALS['tmpl']->caching = true;
		$artilce_cate = load_auto_cache("article_cates");
		$type_id=0;
		$cate_name='';
		$tag = strim($_REQUEST['tag']);  //标签
		foreach($artilce_cate as $k=>$v)
		{
			$artilce_cate[$k]['cate_id']=$v['id'];
			$artilce_cate[$k]['titles']=$v['title'];
			if($id>0&&$v['id']==$id){
				$type_id=intval($v['type_id']);
				$cate_name=$v['title'];
			}
			if($id==$artilce_cate[$k]['cate_id'])
			{
				$artilce_cate[$k]['current']=1;
			}

		}
		$GLOBALS['tmpl']->assign("cate_name",$cate_name);
		$GLOBALS['tmpl']->assign("artilce_cate",$artilce_cate);

		//分页
		$page_size = DEALUPDATE_PAGE_SIZE;
		$page = intval($_REQUEST['p']);
		if($page==0)
			$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
		//条件判断
		$where='1=1 and a.is_delete=0 and a.is_effect=1 and c.is_effect=1';
		if($id>0){
			$where.=' and c.type_id='.$type_id.'  and a.cate_id='.$id;
		}else{
			$where.=' and c.type_id=0 ';
		}
		if($tag!="")
		{
			$where.=" and (a.content like '%".$tag."%' or a.title like '%".$tag."%')";
		}
		$temp_artilce_list = $GLOBALS['db']->getAllCached("SELECT a.*,c.type_id,c.title as cate_name from ".DB_PREFIX."article a LEFT JOIN ".DB_PREFIX."article_cate c on a.cate_id=c.id where $where order by a.update_time desc limit 2");

		$artilce_item=array();
		foreach($temp_artilce_list as $k=>$v)
		{
			//最新智能头条type_id==0普通文章, type_id==1帮助文章，is_hot==1热门，is_week==1本周必读
			if($v['id']>0){
				$artilce_item[$k]['cate_title']=$v['title'];
				$artilce_item[$k]['seo_keyword']=$v['seo_keyword'];
				$artilce_item[$k]['title']=$v['title'];
				$artilce_item[$k]['content']=$v['content'];
				$artilce_item[$k]['update_time']=$v['update_time'];
				$artilce_item[$k]['brief']=$v['brief'];
				$artilce_item[$k]['cate_name']=$v['cate_name'];
				$artilce_item[$k]['writer']=$v['writer'];
				$artilce_item[$k]['icon']=$v['icon'];
				$artilce_item[$k]['tags_arr'] = preg_split("/[ ,]/",$v['tags']);
				$artilce_item[$k]['cate_url']=url('article_cate',array('id'=>$v['cate_id']));
				if($v['rel_url']=="")
					$artilce_item[$k]['url']=url('article',array('id'=>$v['id']));
				else
					$artilce_item[$k]['url']=$v['rel_url'];

			}

		}


		$GLOBALS['tmpl']->assign("artilce_gonggao",$artilce_item);

	}
	public function index()
	{
		$this->articlex();
		$this->gonggao();
    	get_mortgate();
        $GLOBALS['tmpl']->caching = true;

        $cache_id = md5(MODULE_NAME . ACTION_NAME);
//		$image_list = load_dynamic_cache("INDEX_IMAGE_LIST");
//		if($image_list===false)
//		{
//			$image_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."index_image order by sort asc");
//			set_dynamic_cache("INDEX_IMAGE_LIST",$image_list);
//		}
		$image_list = load_auto_cache("index_image");
 		$GLOBALS['tmpl']->assign("image_list",$image_list[0]);
		$cate_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_cate where is_delete=0 order by sort asc");

		$cate_result= array();
		foreach($cate_list as $k=>$v)
		{
			$cate_result[$v['id']] = $v;
		}

		$GLOBALS['tmpl']->assign("cate_list",$cate_result);
		send_deal_success_1();
		send_deal_fail_1();

		//===============首页项目列表START===================
		$page_size = 8;

		$limit =  "0,8";

		$GLOBALS['tmpl']->assign("current_page",1);
 		$deal_result = get_deal_list($limit,'type=0');
 		foreach ($deal_result['list'] as $k=>$v){
 			$cate_id=$v['cate_id'];
			$deal_result['list'][$k]['cate_name']=$GLOBALS['db']->getOne("select name from ".DB_PREFIX."deal_cate where id = $cate_id");
 			$deal_result['list'][$k]['limit_prices']=$v['limit_price']/10000;
 		}
		$GLOBALS['tmpl']->assign("deal_list",$deal_result['list']);
 		$deal_invest_result = get_deal_list($limit,'type=1');
		$GLOBALS['tmpl']->assign("deal_list_invest",$deal_invest_result['list']);

		$new_condition='';
		$hot_conditon='';
if(app_conf("INVEST_STATUS")==1){
			$new_condition='type=0';
			$hot_conditon='type=0';
            $cart_condition='cate_id=1 ';
            $st_condition='cate_id=2';
		}elseif(app_conf("INVEST_STATUS")==2){
			$new_condition='type=1';
			$hot_conditon='type=1';
            $cart_condition='cate_id=1';
            $st_condition='cate_id=2';
		}else{
			$new_condition='type=0';
			$hot_conditon='type=1';
            $cart_condition='cate_id=1';
            $st_condition='cate_id=2';
		}
		$hot_conditon.=' and is_hot=1 ';
        //汽车众筹的项目
       $deal_cart_result = get_deal_list('0,4',$cart_condition,'id desc');
        //var_dump("pre>",$deal_cart_result['list']);exit;
        $GLOBALS['tmpl']->assign("deal_cart_list",$deal_cart_result['list']);

        //商砼众筹的项目
        $deal_st_result = get_deal_list('0,4',$st_condition,'id desc');
        //var_dump('<pre>',$deal_st_result);exit;
        $GLOBALS['tmpl']->assign("deal_st_list",$deal_st_result['list']);
		//最新的项目
		$deal_new_result = get_deal_list('0,4',$new_condition,'id desc');
		$GLOBALS['tmpl']->assign("deal_new_list",$deal_new_result['list']);
		//热门的项目
		$deal_hot_result = get_deal_list('0,4',$hot_conditon,'support_count desc');
		$GLOBALS['tmpl']->assign("deal_hot_list",$deal_hot_result['list']);

		//成功的项目
		$deal_success_result = get_deal_list('0,8','is_success=1','end_time desc');
		
		$GLOBALS['tmpl']->assign("deal_success_list",$deal_success_result['list']);

		//推荐的项目
		$deal_recommend_result = get_deal_list($limit,'is_recommend=1');
		$GLOBALS['tmpl']->assign("deal_recommend_list",$deal_recommend_result['list']);
		//专题项目
		$deal_special_result = get_deal_list($limit,'is_special=1');
		$GLOBALS['tmpl']->assign("deal_special_list",$deal_special_result['list']);

		//成功项目总数
		$success_sum = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where is_delete=0 and is_effect = 1 and is_success = 1");
		$GLOBALS['tmpl']->assign("success_sum",$success_sum);
		//注册会员总数
		$register_sum = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user where  is_effect = 1 ");
		$register_sum=intval($register_sum)+intval(app_conf("VIRSUAL_NUM"));
		$GLOBALS['tmpl']->assign("register_sum",$register_sum);
		//===============首页项目列表END===================

        //links
         $g_links =get_link_by_id();

    	/*虚拟的累计项目总个数，支持总人数，项目支持总金额*/
         if(app_conf("INVEST_STATUS")==0)
         {
         	$condition = " and 1=1 ";
         }
         elseif (app_conf("INVEST_STATUS")==1)
         {
         	$condition = " and type=0 ";
         }
         elseif (app_conf("INVEST_STATUS")==2)
         {
         	$condition = " and type=1 ";
         }
 	 	$virtual_effect = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where is_effect = 1 and is_delete=0 $condition");
 	 	$virtual_person =  $GLOBALS['db']->getOne("select sum((support_count+virtual_num)) from ".DB_PREFIX."deal where is_effect = 1 and is_delete=0 $condition");

	 	$virtual_money_product =  $GLOBALS['db']->getOne("select sum(support_amount+virtual_price) from ".DB_PREFIX."deal where is_effect = 1 and is_delete=0 and type=0 $condition");
		$virtual_money_invest =  $GLOBALS['db']->getOne("select sum(invote_money) from ".DB_PREFIX."deal where is_effect = 1 and is_delete=0 and type=1 $condition");
		$virtual_money=$virtual_money_product+$virtual_money_invest;


		$GLOBALS['tmpl']->assign("virtual_effect",intval($virtual_effect));//项目总个数
		$GLOBALS['tmpl']->assign("virtual_person",intval($virtual_person));//累计支持人
		$GLOBALS['tmpl']->assign("virtual_money",$virtual_money);//筹资总金额
	    /*虚拟的累计项目总个数，支持总人数，项目支持总金额 结束*/

		//首页TAB选项卡
		if(app_conf("INVEST_STATUS")==0)
		{
			$condition = " d.is_delete = 0 and d.is_effect = 1 ";
		}
		elseif (app_conf("INVEST_STATUS")==1)
		{
			$condition = " d.is_delete = 0 and d.is_effect = 1 and d.type=0 ";
		}
		elseif (app_conf("INVEST_STATUS")==2)
		{
			$condition = " d.is_delete = 0 and d.is_effect = 1 and d.type=1 ";
		}

		$condition.="  AND d.is_recommend='1'";

		//最后发起的项目，如果被设置为推荐，被选项卡显示

		$deal_cate_array=$GLOBALS['db']->getAll("select d.* from (select * from ".DB_PREFIX."deal order by sort asc)  as d left join ".DB_PREFIX."deal_cate as dc on dc.id=d.cate_id    where $condition group by d.cate_id order by dc.sort asc ");
		$deal_cate=array();
		$now_time=NOW_TIME;
		foreach ($deal_cate_array as $k=>$v){
			if($v['id']>0){
				$v['cate_name']=$cate_result[$v['cate_id']]['name'];
				$v['percent'] = round($v['support_amount']/$v['limit_price']*100,2);
				$v['num_days'] = ceil(($v['end_time'] - $v['begin_time'])/(24*3600));

				$v['remain_days'] = ceil(($v['end_time'] - $now_time)/(24*3600));
				if($v['begin_time'] > $now_time){
					$v['left_days'] = ceil(($v['begin_time']-$now_time) / 24 / 3600);
				}
				$v['num_days'] = ceil(($v['end_time'] - $v['begin_time'])/(24*3600));
				$deal_ids[] =  $v['id'];

				$deal_cate[$v['id']]=$v;


			}

		}

		//将获取到的虚拟人数和虚拟价格拿到项目列表里面进行统计
		foreach($deal_cate as $k=>$v)
		{
			if($v['type']==1){
				$deal_cate[$k]['virtual_person']=$deal_cate[$k]['invote_num'];
				$deal_cate[$k]['support_count'] =$deal_cate[$k]['invote_num'];
				$deal_cate[$k]['support_amount'] =$deal_cate[$k]['invote_money'];
				$deal_cate[$k]['percent'] = round(($deal_cate[$k]['support_amount'])/$v['limit_price']*100,2);
			}else{
				$deal_cate[$k]['virtual_person']=$deal_cate[$k]['virtual_num'];
				$deal_cate[$k]['support_count'] =$deal_cate[$k]['virtual_num']+$deal_cate[$k]['support_count'];
				$deal_cate[$k]['support_amount'] =$deal_cate[$k]['virtual_price']+$deal_cate[$k]['support_amount'];
				$deal_cate[$k]['percent'] = round(($deal_cate[$k]['support_amount'])/$v['limit_price']*100,2);
 			}
  		}

		$GLOBALS['tmpl']->assign("deal_cate",$deal_cate);
        $GLOBALS['tmpl']->assign("g_links",$g_links);
    	/*投资人列表*/
		$invester_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."user where is_effect=1    order by login_time desc limit 0,22");
		foreach($invester_list as $k=>$v)
		{
			$invester_list[$k]['image'] =get_user_avatar($v["id"],"middle");//用户头像
			$invester_list[$k]['cate_name'] =unserialize($v["cate_name"]);//所在行业领域
			//$invester_list[$k]['icon']=get_user_lever_icon($v["user_level"]);
		}

		$GLOBALS['tmpl']->assign("invester_list",$invester_list);
 		$GLOBALS['tmpl']->display("index.html");
	}		
}
?>