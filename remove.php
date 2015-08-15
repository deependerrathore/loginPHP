<?php 
	require_once 'core/init.php';
	try{

		if(!Input::exists()){

			throw new PDOException('Invalid Request');

		}

		$ids = Input::get('ids');
		
		$idsArray = explode('|',$ids);
		$placeholders = implode(',', array_fill(0, count($idsArray), '?'));
		$db = DB::getInstance();

		$sql = "DELETE FROM `items`
		WHERE `id` IN ({$placeholders})";

		$db->query($sql,$idsArray);

		
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