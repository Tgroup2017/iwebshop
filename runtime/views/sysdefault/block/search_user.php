<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/admin.css";?>" />
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/iwebshop/runtime/_systemjs/artdialog/skins/aero.css" />
</head>
<body style="width:520px;min-height:270px">
<div class="pop_win">
	<form action='<?php echo IUrl::creatUrl("/block/filter_user");?>' method='post'>
		<table class='form_table'>
			<col width="150px" />
			<col />

			<tbody>
				<tr>
					<td class="t_r">用户名：</td>
					<td><input type='text' class='normal' name='search[u.username=]' /></td>
				</tr>
				<tr>
					<td class="t_r">邮箱：</td>
					<td><input type='text' class='normal' name='search[m.email=]' pattern='email' empty /></td>
				</tr>
				<tr>
					<td class="t_r">用户组：</td>
					<td>
						<select class="normal" name="search[m.group_id=]">
							<option value=''>请选择</option>
							<?php $query = new IQuery("user_group");$items = $query->find(); foreach($items as $key => $item){?>
							<option value="<?php echo isset($item['id'])?$item['id']:"";?>"><?php echo isset($item['group_name'])?$item['group_name']:"";?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="t_r">真实姓名：</td>
					<td><input type='text' class='normal' name='search[m.true_name=]' /></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
</body>
</html>