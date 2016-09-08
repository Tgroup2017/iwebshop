<?php
class test  extends IController{

	function  index() {


		//数据查询
		$goodsDBQuery = new IQuery('goods');
		$goodsDBQuery->where = "id=1";
		$goodsDBQuery->cache = 'file';
		$goodsDBQuery->debug = 1;
		$goodsDBQuery->limit = 20;
		$goodsData = $goodsDBQuery->find();

		print_r($goodsData[0]['name']);


 
		//数据插入
		$goodsDBWrite = new IModel("goods");
		$goodsDBWrite->setData(array('sell_price' => 1000));
		$goodsDBWrite->debug=1;
		$goodsDBWrite->update('id = 2');


		//特殊语句
		$sql = 'select name from iwebshop_goods limit 2';
		$goodsData2  = IDBFactory::getDB()->query($sql);
		print_r($goodsData2);
	
 
		

		exit('www');

		$this->setRenderData(array('data'=>1));
		$this->redirect('index',false);
	}
	
}

?>