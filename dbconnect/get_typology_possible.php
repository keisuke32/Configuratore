<?php
	require_once "db_lib.php";
	require_once "../include/enviornment.php";

	$db = new db;

	//Rappresentanza
	$query_rapp_shirt = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 157) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_shirt = $db->select($query_rapp_shirt)->fetch_assoc();

	$query_rapp_pants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 161) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_pants = $db->select($query_rapp_pants)->fetch_assoc();

	$query_rapp_socks = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 262) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_rapp_socks = $db->select($query_rapp_socks)->fetch_assoc();

	//Campo
	$query_campo_shirt = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 157) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_shirt = $db->select($query_campo_shirt)->fetch_assoc();

	$query_campo_pants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 161) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_pants = $db->select($query_campo_pants)->fetch_assoc();

	$query_campo_socks = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 263) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_campo_socks = $db->select($query_campo_socks)->fetch_assoc();


	//Allenamento
	$query_allen_shirt = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 157) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_shirt = $db->select($query_allen_shirt)->fetch_assoc();

	$query_allen_pants = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 161) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_pants = $db->select($query_allen_pants)->fetch_assoc();

	$query_allen_socks = "select count(*) as count
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 264) as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id = 162) as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and wpm.meta_key = 'configuratore' and wpm.meta_value = 1";
	$result_allen_socks = $db->select($query_allen_socks)->fetch_assoc();

	$final_result = array("rapp_shirt" => $result_rapp_shirt["count"], 
							"rapp_pants" => $result_rapp_pants["count"], 
							"rapp_socks" => $result_rapp_socks["count"], 

							"campo_shirt" => $result_campo_shirt["count"], 
							"campo_pants" => $result_campo_pants["count"], 
							"campo_socks" => $result_campo_socks["count"], 

							"allen_shirt" => $result_allen_shirt["count"], 
							"allen_pants" => $result_allen_pants["count"], 
							"allen_socks" => $result_allen_socks["count"]);
	echo json_encode($final_result);
?>