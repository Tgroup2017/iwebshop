<?php $menuData=menu::init($this->admin['role_id']);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台管理</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/admin.css";?>" />
	<meta name="robots" content="noindex,nofollow">
	<link rel="shortcut icon" href="<?php echo IUrl::creatUrl("")."favicon.ico";?>" />
	<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/iwebshop/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/iwebshop/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/common.js";?>"></script>
	<script type='text/javascript' src="<?php echo $this->getWebViewPath()."javascript/admin.js";?>"></script>
</head>
<body>
	<div class="container">
		<div id="header">
			<div class="logo">
				<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo $this->getWebSkinPath()."images/admin/logo.png";?>" width="303" height="43" /></a>
			</div>
			<div id="menu">
				<ul name="topMenu">
					<?php foreach(menu::getTopMenu($menuData) as $key => $item){?>
					<li>
						<a hidefocus="true" href="<?php echo IUrl::creatUrl("".$item."");?>"><?php echo isset($key)?$key:"";?></a>
					</li>
					<?php }?>
				</ul>
			</div>
			<p><a href="<?php echo IUrl::creatUrl("/systemadmin/logout");?>">退出管理</a> <a href="<?php echo IUrl::creatUrl("/system/admin_repwd");?>">修改密码</a> <a href="<?php echo IUrl::creatUrl("/system/default");?>">后台首页</a> <a href="<?php echo IUrl::creatUrl("");?>" target='_blank'>商城首页</a> <span>您好 <label class='bold'><?php echo isset($this->admin['admin_name'])?$this->admin['admin_name']:"";?></label>，当前身份 <label class='bold'><?php echo isset($this->admin['admin_role_name'])?$this->admin['admin_role_name']:"";?></label></span></p>
		</div>
		<div id="info_bar">
			<label class="navindex"><a href="<?php echo IUrl::creatUrl("/system/navigation");?>">快速导航管理</a></label>
			<span class="nav_sec">
			<?php $adminId = $this->admin['admin_id']?>
			<?php $query = new IQuery("quick_naviga");$query->where = "admin_id = $adminId and is_del = 0";$items = $query->find(); foreach($items as $key => $item){?>
			<a href="<?php echo isset($item['url'])?$item['url']:"";?>" class="selected"><?php echo isset($item['naviga_name'])?$item['naviga_name']:"";?></a>
			<?php }?>
			</span>
		</div>

		<div id="admin_left">
			<ul class="submenu">
				<?php $leftMenu=menu::get($menuData,IWeb::$app->getController()->getId().'/'.IWeb::$app->getController()->getAction()->getId())?>
				<?php foreach(current($leftMenu) as $key => $item){?>
				<li>
					<span><?php echo isset($key)?$key:"";?></span>
					<ul name="leftMenu">
						<?php foreach($item as $leftKey => $leftValue){?>
						<li><a href="<?php echo IUrl::creatUrl("".$leftKey."");?>"><?php echo isset($leftValue)?$leftValue:"";?></a></li>
						<?php }?>
					</ul>
				</li>
				<?php }?>
			</ul>
			<div id="copyright"></div>
		</div>

		<div id="admin_right">
			<div class="headbar">
	<div class="position">订单<span>></span><span>单据管理</span><span>></span><span>收款单列表</span></div>
	<div class="operating">
		<a href="javascript:void(0)" onclick="selectAll('id[]')"><button class="operating_btn" type="button"><span class="sel_all">全选</span></button></a>
		<a href="javascript:void(0)" onclick="delModel()"><button class="operating_btn" type="button"><span class="delete">批量删除</span></button></a>
		<a href="javascript:void(0)"><button class="operating_btn" type="button" onclick="location.href='<?php echo IUrl::creatUrl("/order/collection_recycle_list");?>'"><span class="recycle">回收站</span></button></a>
	</div>
</div>
<form name="orderForm" action="<?php echo IUrl::creatUrl("/order/collection_del");?>" method="post">
<div class="content">
	<table class="list_table">
		<colgroup>
			<col width="30px" />
			<col width="30px" />
			<col width="200px" />
			<col width="105px" />
			<col />
		</colgroup>

		<thead>
			<tr>
				<th>选择</th>
				<th></th>
				<th>订单号</th>
				<th>收款金额</th>
				<th>付款人</th>
				<th>支付方式</th>
				<th>支付状态</th>
				<th>完成时间</th>
			</tr>
		</thead>
		<tbody>
			<?php $page= (isset($_GET['page'])&&(intval($_GET['page'])>0))?intval($_GET['page']):1;?>
			<?php $query = new IQuery("collection_doc as c");$query->join = "left join order as o on c.order_id = o.id left join user as u on u.id = c.user_id left join payment as p on c.payment_id = p.id";$query->fields = "o.order_no,c.amount,u.username,p.name,c.id,c.pay_status,c.time";$query->where = "c.if_del = 0";$query->order = "o.id desc";$query->page = "$page";$items = $query->find(); foreach($items as $key => $item){?>
			<tr>
				<td><input name="id[]" type="checkbox" value="<?php echo isset($item['id'])?$item['id']:"";?>" /></td>
				<td><a href="<?php echo IUrl::creatUrl("/order/collection_show/id/".$item['id']."");?>"><img class="operator" src="<?php echo $this->getWebSkinPath()."images/admin/icon_check.gif";?>" title="查看" /></a></td>
				<td><?php echo isset($item['order_no'])?$item['order_no']:"";?></td>
				<td><?php echo isset($item['amount'])?$item['amount']:"";?></td>
				<td><?php echo isset($item['username'])?$item['username']:"";?></td>
				<td><?php echo isset($item['name'])?$item['name']:"";?></td>
				<td><?php if($item['pay_status']==1){?>支付完成<?php }else{?>准备中<?php }?></td>
				<td><?php echo isset($item['time'])?$item['time']:"";?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</div>
<?php echo $query->getPageBar();?>
</form>

		</div>
	</div>

	<script type='text/javascript'>
	//隔行换色
	$(".list_table tr:nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);

	//按钮高亮
	var topItem  = "<?php echo key($leftMenu);?>";
	$("ul[name='topMenu']>li:contains('"+topItem+"')").addClass("selected");

	var leftItem = "<?php echo IUrl::getUri();?>";
	$("ul[name='leftMenu']>li a[href^='"+leftItem+"']").parent().addClass("selected");
	</script>
</body>
</html>
