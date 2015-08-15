<?php 
	
	require_once 'core/init.php';

	$db = DB::getInstance();

	try{

		$sql = "SELECT 	`i`.*,
		`t`.`name` AS `type_name`
		FROM `items` `i`
		JOIN `types` `t`
		ON `t`.`id` = `i`.`type` 
		ORDER BY `i`.`date` ASC";

		$result = $db->query($sql);

		

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