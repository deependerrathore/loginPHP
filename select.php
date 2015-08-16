<?php 
	
	require_once 'core/init.php';

	$db = DB::getInstance();
	$userid = Session::get(Config::get('session/session_name'));
	try{

		$sql = "SELECT 	`i`.*,
		`t`.`name` AS `type_name`
		FROM `items` `i`
		JOIN `types` `t`
		ON `t`.`id` = `i`.`type`
		WHERE `i`.`userid` = ? 
		ORDER BY `i`.`date` ASC";

		$result = $db->query($sql,array($userid));

		

		$items = $db->results();

		$sql = "SELECT * 
		FROM `types`
		ORDER BY `id`";

		$result = $db->query($sql);
		


		$types = $db->results();

		echo json_encode(array(
			'error' => false,
			'items' => $items,
			'types'=> $types
			),JSON_HEX_TAG|JSON_HEX_APOS | JSON_HEX_QUOT |JSON_HEX_AMP);


	}catch(PDOException $e){
		echo json_encode(array(
			'error' => true,
			'message' => $e->getMessage()
			),JSON_HEX_TAG|JSON_HEX_APOS | JSON_HEX_QUOT |JSON_HEX_AMP);
	}
 ?>