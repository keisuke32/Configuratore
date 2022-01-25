<?php
	require_once "db_lib.php";
	require_once "../include/enviornment.php";

	// echo $_POST["sport"];
	$start_num = $_POST["current"] * 21;
	$db = new db;
	$query = "select t1.object_id, wp.post_title as name
	from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["typology"] . ") as t4 on t1.object_id=t4.object_id
	inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["type"] . ") as t5 on t1.object_id=t5.object_id
	inner join wp_posts wp on t1.object_id = wp.ID
	inner join wp_postmeta wpm on wpm.post_id = wp.ID
	where wp.post_type = 'product' and (t1.object_id in ( select post_id from wp_postmeta where meta_key = 'configuratore' and meta_value = 1)) and ((wpm.meta_key = '_sku' and wpm.meta_value like '%" . $_POST["search_word"] . "%') or wp.post_title like '%" .  $_POST["search_word"] . "%') group by t1.object_id limit " . $start_num . ", 21";
	// echo $query;
	$result = $db->select($query);
	$html_result = "";
	$index = $start_num + 1;
	$group_index = 4;
	$input_name = "t_shirt_type";
	if($_POST["type"] == "161")
	{
		$group_index = 6;
		$input_name = "pants_type";
	}else if($_POST["type"] == "162")
	{
		$group_index = 8;
		$input_name = "socks_type";
	}
	while($row = $result->fetch_assoc()) {
		$post_id = $row["object_id"];

		$query_img = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_thumbnail_id' AND post_id = $post_id";
        $result_img = $db->select($query_img);
        if($result_img)
        	$img = $result_img -> fetch_assoc();
        else
        	$img = array("meta_value" => "");

        $query_img_2 = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_wp_attached_file' AND post_id = ".$img['meta_value']."";
        $result_img_2 = $db->select($query_img_2);
        if($result_img_2)
        	$img_2 = $result_img_2 -> fetch_assoc();
        else
        	$img_2 = array("meta_value" => "blank-placeholder.jpg");

        $query_price = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_price' AND post_id = $post_id";
        $result_price = $db->select($query_price);
        if($result_price)
        	$price = $result_price -> fetch_assoc();
        else
        	$price = array("meta_value" => "");

        $query_sku = "SELECT meta_value FROM wp_postmeta WHERE meta_key ='_sku' AND post_id = $post_id";
        $result_sku = $db->select($query_sku);
        if($result_sku)
        	$sku = $result_sku -> fetch_assoc();
        else
        	$sku = array("meta_value" => "");

		$html_result .= '<div class="col-6 col-md-4"><div class="item">';
		$html_result .= '<input data-price="" data-label="" id="answer_' . $index . '_group_' . $group_index . '" type="radio" name="' . $input_name . '" value="' . $post_id . '" class="required">';
		// $html_result .= '<label for="answer_' . $index . '_group_' . $group_index . '"><img src="' . $site_url . $images_path . $img_2["meta_value"] . '" alt="" class="img-fluid"><span class="item_price">€' . $price["meta_value"] . '</span><strong>' . $row["name"] . '</strong><input type="hidden" value="' . $price["meta_value"] . '"></input></label></div></div>';
		$html_result .= '<label for="answer_' . $index . '_group_' . $group_index . '"><img src="' . $site_url . $images_path . $img_2["meta_value"] . '" alt="" class="img-fluid"><span class="item_price">' . $sku["meta_value"] . '</span><strong>' . $row["name"] . '</strong></label></div></div>';
		$index++;
	}
	$final_page = 0;
	$query_product_count = "select count(distinct t1.object_id) as count
							from (select * from wp_term_relationships where term_taxonomy_id=" . $_POST["sport"] . ") as t1
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["gender"] . ") as t2 on t1.object_id=t2.object_id
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["brand"] . ") as t3 on t1.object_id=t3.object_id
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["typology"] . ") as t4 on t1.object_id=t4.object_id
							inner join (select * from wp_term_relationships where term_taxonomy_id =" . $_POST["type"] . ") as t5 on t1.object_id=t5.object_id
							inner join wp_posts wp on t1.object_id = wp.ID
							inner join wp_postmeta wpm on wpm.post_id = wp.ID
							where wp.post_type = 'product' and (t1.object_id in ( select post_id from wp_postmeta where meta_key = 'configuratore' and meta_value = 1)) and ((wpm.meta_key = '_sku' and wpm.meta_value like '%" . $_POST["search_word"] . "%') or wp.post_title like '%" .  $_POST["search_word"] . "%')";
	// echo $query_product_count;
    $result_product_count = $db->select($query_product_count);
    $product_count = $result_product_count -> fetch_assoc();
    if($product_count["count"] <= $start_num + 21)
    	$final_page = 1;
	$final_result = array("html" => $html_result, "final" => $final_page);
	echo json_encode($final_result);
?>