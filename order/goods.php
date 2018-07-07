<?php 
	include './db.php';
	$db = DB::getIntance();

	//1.把处理的记录(订单)更新为处理中（先锁住要处理的订单，防止其他系统操作）
		$waiting = array('status'=>0);
		$lock = array('status'=>2);
		$res_lock = $db->update('order_queue',$lock,$waiting,2);
	
		if($res_lock){
			//2.选择刚刚处理中的订单进行配送系统的处理
			$res_all =  $db->selectAll('order_queue',$lock);

			//配货系统处理
			//.......
			//3.处理过的订单数据更新为已完成
			$success = array(
				'status'=>1,
				'update_at'=>date('Y-m-d H:i:s',time())
				);
			$res_last = $db->update('order_queue',$success,$lock);
			if($res_last){
				echo 'success :' .$res_last;
			}else{
				echo 'fail :' .$res_last;
			}
		}else{
			echo 'ALL Finished';
		}
	
	
 ?>