<?php
include './db.php';
echo(microtime());die;
if(!empty($_GET['mobile'])){
	//订单中心处理流程生成订单
	$order_id = rand(100000,999999);

	//生成订单
	$insert_data = array(
		'order_id'=>$order_id,
		'mobile'=>$_GET['mobile'],
		'created_at'=>date('Y-m-d H:i:s',time()),
		'status'=>0,
		);

	$db = DB::getIntance();
	$res = $db->insert('order_queue',$insert_data);
	if($res){
		echo $insert_data['order_id'].'订单保存成功';
	}else{
		echo '订单保存失败';	
	}
}

    
?>