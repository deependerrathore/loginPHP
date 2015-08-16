<?php 	
	
	require_once 'core/init.php';
	try{

		if(!Input::exists()){
			throw new PDOException('Invalid Request');
		}
		

		$id = Input::get('id');
		$done = empty($_POST['done']) ? 0 : 1;

		$db = DB::getInstance();

		$db->update('items',$id,array(
			'done'=> $done)
		);

		
		echo json_encode(array(
			'error' => false
			
			),JSON_HEX_TAG|JSON_HEX_APOS | JSON_HEX_QUOT |JSON_HEX_AMP);


	}catch(PDOException $e){
		echo json_encode(array(
			'error' => true,
			'message' => $e->getMessage()
			),JSON_HEX_TAG|JSON_HEX_APOS | JSON_HEX_QUOT |JSON_HEX_AMP);
	}
 ?>