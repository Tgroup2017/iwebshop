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
			<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/areaSelect/areaSelect.js"></script>
<?php $ship=$this->data?>
<div class="headbar clearfix">
	<div class="position">订单<span>></span><span>快递单管理</span><span>></span><span><?php if(isset($ship['id'])){?>修改<?php }else{?>添加<?php }?>发货信息</span></div>
</div>

<form name="ModelForm" action="<?php echo IUrl::creatUrl("/order/ship_info_update");?>" method="post">
<input type="hidden" name="sid" value="<?php echo isset($ship['id'])?$ship['id']:"";?>"/>
<div class="content_box">
	<div class="content form_content">
		<table id="tab-1" class="form_table" name="table">
			<col width="150px" />
			<col />
			<tr>
				<th>发货点名称：</th>
				<td><input class="normal" name="ship_name" type="text" pattern="required" value="<?php echo isset($ship['ship_name'])?$ship['ship_name']:"";?>" alt="发货点名称"//><label>*发货地点名称</label></td>
			</tr>
			<tr>
				<th>发货人姓名：</th>
				<td><input class="normal" name="ship_user_name" type="text" pattern="required" value="<?php echo isset($ship['ship_user_name'])?$ship['ship_user_name']:"";?>"  alt="发货人姓名"/><label>*发货人名称</label></td>
			</tr>
			<tr>
				<th>性别：</th>
				<td><label class='attr'><input type="radio" name="sex" value="1" checked/>先生</label><label class='attr'><input type="radio" name="sex" value="0" <?php if($ship['sex']==0){?>checked='checked'<?php }?>/>女士</label><label>*</label></td>
			</tr>
			<tr>
				<th>地区：</th>
				<td>
					<select name="province" child="city,area"></select>
					<select name="city" child="area"></select>
					<select name="area" pattern="required" alt="请选择完整地区"></select>
				</td>
			</tr>
			<tr>
				<th>地址：</th>
				<td><input class="normal" name="address" type="text" pattern="required" value="<?php echo isset($ship['address'])?$ship['address']:"";?>"  alt="具体地址错误"/><label>*具体地址</label></td>
			</tr>
			<tr>
				<th>邮编：</th>
				<td><input class="normal" name="postcode" type="text" pattern="zip" value="<?php echo isset($ship['postcode'])?$ship['postcode']:"";?>" empty alt="邮编错误"/><label>邮政编码</label></td>
			</tr>
			<tr>
				<th>手机：</th>
				<td><input class="normal" name="mobile" type="text" pattern='mobi' value="<?php echo isset($ship['mobile'])?$ship['mobile']:"";?>"/><label>*手机号码</label></td>
			</tr>
			<tr>
				<th>电话：</th>
				<td><input class="normal" name="telphone" type="text" pattern="phone" empty alt="电话号码错误" value="<?php echo isset($ship['telphone'])?$ship['telphone']:"";?>" /></td>
			</tr>
			<tr>
				<th></th>
				<td><label><input type="checkbox" name="is_default" value="1" <?php if($ship['is_default']==1){?>checked='checked'<?php }?>/>&nbsp;设置为默认地址</label></td>
			</tr>
			<tr>
				<th></th>
				<td><button class="submit" type="submit"><span>保 存</span></button></td>
			</tr>
		</table>
	</div>
</div>
</form>

<script type='text/javascript'>
var areaInstance = new areaSelect('province');
<?php if(isset($ship) && $ship){?>
	areaInstance.init(<?php echo JSON::encode($ship);?>);
<?php }else{?>
	areaInstance.init();
<?php }?>
</script>
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
