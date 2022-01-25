<?php
	require_once "db_lib.php";

	$db = new db;
	$query = "select post_content from wp_posts where id = " . $_POST["product"];
	$result = $db->select($query);
	$html_result = "";
	while($row = $result->fetch_assoc()) {
		$html_result = $row["post_content"];
	}
	echo $html_result;
?>