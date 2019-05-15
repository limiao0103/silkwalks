<?php
header("Content-type: text/html; charset=utf-8");

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
m.dwbh,   
m.dwmch,
m.hangymch,
z.qustion,
z.zjm,
z.niming,
z.rsjjlxr,
z.rsxp
from mchk as m  JOIN zhiydoc as z on m.dwbh = z.dzyname 
where m.dwbh <>'DWI10000218' and  m.dwbh <>'DWI10000254'  and m.dwbh <>'DWI10000246' and  m.dwbh <>'DWI10000252' and m.dwmch is not null and trim(m.dwmch) <>''
order by z.qustion asc";

//and (z.zjm=2 or z.zjm=3 or z.zjm=1 or z.zjm=4 or z.zjm=5 0r )

$supplierInfoList_query = mysql_query($supplierInfoList_sql);

$xuhao = 1;	//序号
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="white">
	<title>带路者官网</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.flip.min.js"></script>
	<script src="js/index.js"></script>

</head>
	<div class="wrap">

		<div class="top_header">
			<div class="w">
				<div class="left">
					<p>您好，欢迎来到，带路者！</p>
				</div>
				<div class="right">
					<div>
						<p><i></i><span>010-63838998</span></p>
						<p><i  class="email"></i><span>sw@Silkwalks.com</span></p>
					</div>
				</div>
			</div>
		</div>

		<!--nav开始-->
		<div class="nav">
			<div class="w clearfix">
				<div class="top_left">
					<h1><img src="images/common/header_logo.png"/></h1>
				</div>
				<div class="nav_all">
					<div class="nav_l">
						<ul>
							<li>
								<a href="index.html">首页</a>
							</li>
							<li><a href="about_me.html">关于我们</a>
								<!--<div class="nav_box">
                                    <ul>
                                        <li class="curr"><a href="join-condition.html">加盟条件</a></li>
                                        <li><a href="partners.html">加盟申请</a></li>
                                        <li><a href="join-log%20in.html">代理商登录</a></li>
                                    </ul>
                                </div>-->
							</li>
							<li><a href="news.html">新闻动态</a></li>
							<li><a href="culture.html">企业文化</a></li>
							<li  class="current1"><a href="partners.php">合作伙伴</a></li>
							<li><a href="server_platform.html">服务平台</a></li>
							<li><a href="contact.html">联系我们</a></li>
						</ul>
					</div>
					<!--<div class="nav_r">
                        <ul>
                            <li>
                                <a href="sign-in.html"><input class="zhuce" type="button" value="注册" /></a>
                            </li>
                            <li>
                                <a href="log-in.html"><input class="denglu" type="button" value="登录" /></a>
                            </li>
                            <li>
                                <p><images ecms="images/user_icon.png" />用户中心</p>
                            </li>
                        </ul>
                    </div>-->
				</div>
			</div>
		</div>
		<!--nav结束-->


		<!--banner 开始-->
		<div class="banner" style="height: 500px" >
			<a href="#" class="d1" style="background:url(picture/partners_banner.gif) 0 0 / 100% 100% no-repeat;height: 500px"></a>
		</div>
		<!--banner 结束-->

		<!--partners开始-->
		<div class="partner">

			<div class="title">
				<p><span>Partner Lists</span><span>合作伙伴列表</span></p>
				<i></i>
			</div>

			<div class="w partner_list" style="margin-top: -50px" >
				<div class="table-head" style="padding-right:17px">
					<table class="w" cellpadding="0" cellspacing="0" style="margin-bottom: -1px">
						<!--<colgroup>
							<col style="width: 80px;" /><col />
							<col style="width: 160px;" /><col />
						</colgroup>-->
						<thead>
						<tr>
							<th style="width: 80px;" >序号</th>
							<th style="width: 180px;" >供应商编码</th>
							<th style="width: 340px;">供应商名称</th>
							<th style="width: 120px;">行业分类</th>
<!--							<th>注册时间</th>-->
						</tr>
						</thead>
					</table>
				</div>
				<div class="table-body" style="width: 100%;max-height: 621px;overflow-y: auto;overflow-x: hidden">
					<table class="w" cellpadding="0" cellspacing="0" style="margin-top: 0;">
						<tbody>
						<?php
						while($supplierInfoList_result = mysql_fetch_assoc($supplierInfoList_query)){
							//构造显示一行记录的html脚本
							$html_result = '<tr>
								<td style="width: 80px;">'.$xuhao.'</td>
								<td style="width: 180px;">'.$supplierInfoList_result["dwbh"].'</td>
								<td style="width: 340px;">'.$supplierInfoList_result["dwmch"].'</td>
								<td style="width: 120px;">'.$supplierInfoList_result["hangymch"].'</td>
								<td style="display:none;">'.$supplierInfoList_result["qustion"].'</td>
							</tr>';

							$xuhao++;

							echo $html_result;

						}



						?>
						</tbody>

					</table>
				</div>
			</div>

			<div class="title">
				<p><span>Partner Logos</span><span>合作伙伴Logo墙</span></p>
				<i></i>
			</div>

			<div class="w partner_list">
				<i></i>
				<a href="partners.php"><span>查看更多</span></a>
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
	//屏蔽右键菜单
	document.oncontextmenu = function (event){
		if(window.event){
			event = window.event;
		}try{
			var the = event.srcElement;
			if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")){
				return false;
			}
			return true;
		}catch (e){
			return false;
		}
	};


	//屏蔽粘贴
	document.onpaste = function (event){
		if(window.event){
			event = window.event;
		}try{
			var the = event.srcElement;
			if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")){
				return false;
			}
			return true;
		}catch (e){
			return false;
		}
	}


	//屏蔽复制
	document.oncopy = function (event){
		if(window.event){
			event = window.event;
		}try{
			var the = event.srcElement;
			if(!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")){
				return false;
			}
			return true;
		}catch (e){
			return false;
		}
	}


	//屏蔽剪切
	document.oncut = function (event){
		if(window.event){
			event = window.event;
		}try{
			var the = event.srcElement;
			if(!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")){
				return false;
			}
			return true;
		}catch (e){
			return false;
		}
	};


	//屏蔽选中
	document.onselectstart = function (event){
		if(window.event){
			event = window.event;
		}try{
			var the = event.srcElement;
			if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")){
				return false;
			}
			return true;
		} catch (e) {
			return false;
		}
	}
</script>

</html>
