<?php 
	require_once 'core/init.php';

	try{
		if(!Input::exists()){
			throw new PDOException('Invalid Request');
		}


		$item = Input::get('item');
		$qty =  Input::get('qty');
		$type = Input::get('type');

		$db = DB::getInstance();	
		$db->insert('items',array(
			'item' => $item,
			'qty' => $qty,
			'type' => $type
			));
		$id = $db->lastid();

		$sql = "SELECT `i`.*,
		`t`.`name` AS `type_name`
		FROM `items` `i`
		JOIN `types` `t` 
		ON `t`.`id` =`i`.`type`
		WHERE `i`.`id` = ?";

		$db->query($sql,array($id));
		$item = $db->first();

		header('Content-type: application/json');
		echo json_encode(array(
			'error' => false,
			'item' => $item
			), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);


		
	}catch(PDOException $e){
		echo json_encode(array(
			'error' =>true,
			'message' => $e->getMessage()
			),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |JSON_HEX_AMP);
	}


	
 ?>