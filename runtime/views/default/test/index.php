<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--  <script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/iwebshop/runtime/_systemjs/autovalidate/style.css" /> -->
 <script type="text/javascript" charset="UTF-8" src="/iwebshop/runtime/_systemjs/form/form.js"></script>
</head>
<body class="index">
<!-- 
<a href="<?php echo IUrl::creatUrl("/site/index/id/1/sun/us/jsj/s");?>">首页</a>
<a href="<?php echo IUrl::creatUrl("http://www.baidu.com");?>">首页</a>
<img src="<?php echo IUrl::creatUrl("")."image/logo.png";?>"/>

<form callback='test("回调一下")'>
	<input name='email' pattern='email'   alt='请输入正确的email'>
	<input name='email' pattern='^\d{3,5}' alt='请输入一个3-5 位的数字'>
	<input type='submit'/>

</form> -->
<form name="test">
	<input name='email' ></br>
<input type="radio" name="sex" value='1'>男<input type="radio" name="sex"
value='0'>女</br>
<input type="checkbox" name="live" value='a'>看书<input type="checkbox"
name="live" value='b'>打球</br>
<select name="code">
<option value="c++">c++</option>
<option value="java">java</option>
<option value="php">php</option>
</select>
<input type='submit'/>
<?php $name='sun'?>
<?php echo isset($name)?$name:"";?>
<?php $score=80?>
<?php if($score>90){?> 优秀
<?php }elseif($score>70){?>良好
<?php }else{?>一般
<?php }?>
<?php $num=10?>
<?php while($num-->0){?>
<?php echo isset($num)?$num:"";?>
<?php }?>

<?php for($i = 2 ; $i<=10 ; $i = $i+1){?>
<?php echo isset($i)?$i:"";?><br/>
<?php }?>
<?php $numbers = array(1,2,3,4,5,6,7,8,9)?>
<?php foreach($numbers as $k => $v){?>
key:<?php echo isset($k)?$k:"";?>---value:<?php echo isset($v)?$v:"";?><br/>
<?php }?>
<?php $page=IReq::get('page')==null?1:IReq::get('page');?>
<?php $query = new IQuery("goods");$query->page = "$page";$query->pagesize = "5";$items = $query->find(); foreach($items as $key => $item){?>
<?php echo isset($item['name'])?$item['name']:"";?><br/>
<?php }?>
<?php echo $query->getPageBar();?>
<?php $query = new IQuery("user as u");$query->join = "left join member as m on m.user_id = u.id";$items = $query->find(); foreach($items as $key => $item){?>
<?php echo isset($item['user_id'])?$item['user_id']:"";?><?php echo isset($item['username'])?$item['username']:"";?>
<?php }?>
</form>
</body>
<script type="text/javascript">
var form = new Form('test');
form.init({'email':'173058129@qq.com','sex':'0','live':'a','code':'php'});
function test(txt){
	alert(txt);
	return false;
}
</script>
</html>