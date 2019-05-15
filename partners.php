<?php
/*header("Content-type: text/html; charset=utf-8");

$conn = @mysql_connect("114.55.119.7","supplier","supplier@silkwalk666");

if(!$conn)
{
	die("数据库连接失败:" . mysql_error());
}

//连接
mysql_select_db("dlz",$conn);

//字符转换，读库
mysql_query("set character set 'utf-8'");

//写库
mysql_query("set names 'utf8'");

$supplier_info_list = "";


$supplierInfoList_sql="select 
m.qylg_url
from mchk as m  JOIN zhiydoc as z on m.dwbh = z.dzyname  and (z.zjm=2)
where m.qylg_url is not null
order by z.qustion desc";

$supplierInfoList_query = mysql_query($supplierInfoList_sql);

$xuhao = 1;	//序号
*/?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="white">
	<title>带路者官网</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/ajaxload.js"></script>
	<!--<script src="js/jquery.flip.min.js"></script>-->
	<script src="js/index.js"></script>

</head>

<body>
<div class="wrap">
	<!--头部-->
	<div id="header"></div>
	<script>
		$("#header").load("comment/header.html");
	</script>

	<!--banner 开始-->
	<div class="banner" style="height: 500px" >
		<a href="#" class="d1" style="background:url(picture/partners_banner.gif) 0 0 / 100% 100% no-repeat;height: 500px"></a>
	</div>
	<!--banner 结束-->

	<!--partners开始-->
	<div class="partner w">
		<div class="title">
			<p><span>Cooperative partenr</span><span>合作伙伴</span></p>
			<i></i>
		</div>

		<div  id="partners">
			<!--<div class="partners_tab">
				<span class="change">供应商</span>
				<span>客户</span>
			</div>-->
			<div class="sponsorListHolder supplier" id="suppliers" style="width: 100%;max-height:620px;overflow-y: auto">
				<!--供应商logo列表-->
		 		<!--while($supplierInfoList_result = mysql_fetch_assoc($supplierInfoList_query)){
					//构造显示一行记录的html脚本
					$html_result = '<div class="sponsor" title="Click to flip">
										<div class="sponsorFlip">
											<img src="../forsupplies/'.$supplierInfoList_result["qylg_url"].'" />
										</div>
									</div>';
					echo $html_result;

				}-->
				<div class="interval"></div>
				<div class="clear"></div>
			</div>
			<!--<div class="sponsorListHolder customer" style="width: 100%;max-height:620px;overflow-y: auto">

				<div class="sponsor" title="Click to flip">
					<div class="sponsorFlip">
						<img src="picture/customer/zrgt.png" />
					</div>
				</div>

				<div class="interval"></div>
				<div class="clear"></div>
			</div>-->
		</div>

		<div class="title">
			<p><span>Company details</span><span>企业详情</span></p>
			<i></i>
		</div>

		<div class=" partner_list">
			<i></i>
			<a href="partners_list.php"><span>查看更多</span></a>
		</div>
	</div>
	<!--partners结束-->

	<!--尾部-->
	<div class="footer" id="footer"></div>
	<script>
		$("#footer").load("comment/footer.html");
	</script>
</div>
<script>
	$().ready(function(){
		$(".sponsorListHolder").eq(0).show();
		$(".partners_tab span").mouseover(function(){
			//通过 .index()方法获取元素下标，从0开始，赋值给某个变量
			var _index = $(this).index();
			//让内容框的第 _index 个显示出来，其他的被隐藏
			$(".sponsorListHolder").eq(_index).show().siblings(".sponsorListHolder").hide();
			//改变选中时候的选项框的样式，移除其他几个选项的样式
			$(this).addClass("change").siblings(".partners_tab span").removeClass("change");
		});
	});
</script>

</body>
</html>
