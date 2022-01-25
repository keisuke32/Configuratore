<?php
	require_once "db_lib.php";
	require_once "../include/enviornment.php";

	$db = new db;
	$query = "select * from wp_posts where id = " . $_POST["product"];
	$result = $db->select($query);
	$html_result = "";
	while($row = $result->fetch_assoc()) {
		$post_id = $row["ID"];

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

                $query_long_pants = "SELECT * FROM `wp_term_relationships` where term_taxonomy_id ='268' AND object_id = $post_id";
                $result_long_pants = $db->select($query_long_pants);
                $long_pants = $result_long_pants -> fetch_assoc();
                $is_long_pants = "false";
                if($long_pants){
                        $is_long_pants = "true";
                }

		$html_result .= '<div class="item"><input data-price="" id="answer_1_group_4" data-label="" type="radio" name="answer_group_4" value="">';
		// $html_result .= '<label for="answer_1_group_4"><div class="zoomer_wrapper product_zoom_img"><img src="' . $site_url . $images_path . $img_2["meta_value"] . '" alt="" class="img-fluid"></div><span class="item_price">€' . $price["meta_value"] . '</span><strong>' . $row["post_title"] . '</strong><input type="hidden" id="shirt_price" value="' . $price["meta_value"] . '"></label></div>';
		$html_result .= '<label for="answer_1_group_4"><div class="zoomer_wrapper product_zoom_img"><img src="' . $site_url . $images_path . $img_2["meta_value"] . '" alt="" class="img-fluid"></div><span class="item_price">' . $sku["meta_value"] . '</span><strong>' . $row["post_title"] . '</strong><input type="hidden" id="shirt_price" value="' . $price["meta_value"] . '"><input type="hidden" id="is_long_pants" value="' . $is_long_pants . '"></label></div>';
	}
	echo $html_result;
?>