jQuery(document).ready(function(){

    $(window).on("resize", function(e) {
        $(".zoomer_wrapper").zoomer("resize");
    });

	jQuery("input[name=sport_type]").change(function () {
		jQuery("#selected_sport_type").val(this.value);
        jQuery("#selected_sport_type_name").val(jQuery(this).parent().children().last().children().last().html());
	});
	jQuery("input[name=gender_type]").change(function () {
		jQuery("#selected_gender_type").val(this.value);
        jQuery("#selected_gender_type_name").val(jQuery(this).parent().children().last().children().last().html());
	});
	jQuery("input[name=brand_type]").change(function () {
		jQuery("#selected_brand_type").val(this.value);
        jQuery("#selected_brand_type_name").val(jQuery(this).parent().children().last().children().last().html());
	});
	jQuery("input[name=typology_type]").change(function () {
		jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(this.value);
        jQuery("#selected_typology_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children().last().html());
	});
    jQuery("input[name=clothes_type]").change(function () {
        jQuery("#selected_clothes_type_" + jQuery("#total_order_count").val()).val(this.value);
        jQuery("#selected_clothes_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children().last().html());
    });

	
    $("#shirt_loadmore").on('click', function(){
        //shirt 157 pants 161 socks 162
        var param = {
            sport : $("#selected_sport_type").val(),
            gender: $("#selected_gender_type").val(),
            brand: $("#selected_brand_type").val(),
            typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
            type : 157,
            current : parseInt($("#shirt_current_page").val()) + 1,
            search_word : $("#shirt_search_word").val()
        };
        $.ajax({
            type: "POST",
            url: "dbconnect/get_products.php",
            data: param,
            success: function(res){
                if(JSON.parse(res).html != "")
                {
                    $("#select_t_shirt").html($("#select_t_shirt").html() + JSON.parse(res).html);
                    $("#shirt_current_page").val(parseInt($("#shirt_current_page").val()) + 1);

                    $("#loader_product").fadeIn();
                    var img_loaded_count = 0;
                    $('#select_t_shirt img').load(function(){
                        img_loaded_count++;
                        if(img_loaded_count == $('#select_t_shirt img').length)
                            $("#loader_product").fadeOut();
                    });
                }
                if(JSON.parse(res).final == 1)
                    $("#shirt_loadmore").hide();
                else
                    $("#shirt_loadmore").show();
                jQuery("input[name=t_shirt_type]").change(function () {
                    jQuery("#selected_t_shirt_type_" + jQuery("#total_order_count").val()).val(this.value);
                    jQuery("#selected_t_shirt_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
                });
            }
        });
    });

    $("#pants_loadmore").on('click', function(){
        //shirt 157 pants 161 socks 162
        var param = {
            sport : $("#selected_sport_type").val(),
            gender: $("#selected_gender_type").val(),
            brand: $("#selected_brand_type").val(),
            typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
            type : 161,
            current : parseInt($("#pants_current_page").val()) + 1,
            search_word : $("#pants_search_word").val()
        };
        $.ajax({
            type: "POST",
            url: "dbconnect/get_products.php",
            data: param,
            success: function(res){
                if(JSON.parse(res).html != "")
                {
                    $("#select_pants").html($("#select_pants").html() + JSON.parse(res).html);
                    $("#pants_current_page").val(parseInt($("#pants_current_page").val()) + 1);

                    $("#loader_product").fadeIn();
                    var img_loaded_count = 0;
                    $('#select_pants img').load(function(){
                        img_loaded_count++;
                        if(img_loaded_count == $('#select_pants img').length)
                            $("#loader_product").fadeOut();
                    });
                }
                if(JSON.parse(res).final == 1)
                    $("#pants_loadmore").hide();
                else
                    $("#pants_loadmore").show();
                jQuery("input[name=pants_type]").change(function () {
                    jQuery("#selected_pants_type_" + jQuery("#total_order_count").val()).val(this.value);
                    jQuery("#selected_pants_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
                });
            }
        });
    });

    $("#socks_loadmore").on('click', function(){
        //shirt 157 pants 161 socks 162
        var param = {
            sport : $("#selected_sport_type").val(),
            gender: $("#selected_gender_type").val(),
            brand: $("#selected_brand_type").val(),
            typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
            type : 162,
            current : parseInt($("#socks_current_page").val()) + 1,
            search_word : $("#socks_search_word").val()
        };
        $.ajax({
            type: "POST",
            url: "dbconnect/get_products.php",
            data: param,
            success: function(res){
                if(JSON.parse(res).html != "")
                {
                    $("#select_socks").html($("#select_socks").html() + JSON.parse(res).html);
                    $("#socks_current_page").val(parseInt($("#socks_current_page").val()) + 1);

                    $("#loader_product").fadeIn();
                    var img_loaded_count = 0;
                    $('#select_socks img').load(function(){
                        img_loaded_count++;
                        if(img_loaded_count == $('#select_socks img').length)
                            $("#loader_product").fadeOut();
                    });
                }
                if(JSON.parse(res).final == 1)
                    $("#socks_loadmore").hide();
                else
                    $("#socks_loadmore").show();
                jQuery("input[name=socks_type]").change(function () {
                    jQuery("#selected_socks_type_" + jQuery("#total_order_count").val()).val(this.value);
                    jQuery("#selected_socks_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
                });
            }
        });
    });

    $('#shirt_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_shirts(0);
        }
    });
    $('#pants_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_pants(0);
        }
    });
    $('#socks_search_word').keyup(function(e){
        if(e.keyCode == 13)
        {
            search_socks(0);
        }
    });
});

function search_shirts(flag_reset){
    if(flag_reset == 1)
        $("#shirt_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 157,
        current : 0,
        search_word : $("#shirt_search_word").val()
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){
            if(JSON.parse(res).html != "")
            {
                $("#select_t_shirt").html(JSON.parse(res).html);
                $("#shirt_current_page").val(0);
                $("#no_shirts_label").hide();
                $("#no_search_shirts_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_t_shirt img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_t_shirt img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_t_shirt").html("");
                $("#shirt_loadmore").hide();
                $("#no_shirts_label").hide();
                $("#no_search_shirts_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#shirt_loadmore").hide();
            else
                $("#shirt_loadmore").show();
            jQuery("input[name=t_shirt_type]").change(function () {
                jQuery("#selected_t_shirt_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_t_shirt_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}

function search_pants(flag_reset){
    if(flag_reset == 1)
        $("#pants_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 161,
        current : 0,
        search_word : $("#pants_search_word").val()
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){
            if(JSON.parse(res).html != "")
            {
                $("#select_pants").html(JSON.parse(res).html);
                $("#pants_current_page").val(0);
                $("#no_pants_label").hide();
                $("#no_search_pants_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_pants img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_pants img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_pants").html("");
                $("#pants_loadmore").hide();
                $("#no_pants_label").hide();
                $("#no_search_pants_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#pants_loadmore").hide();
            else
                $("#pants_loadmore").show();
            jQuery("input[name=pants_type]").change(function () {
                jQuery("#selected_pants_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_pants_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}

function search_socks(flag_reset){
    if(flag_reset == 1)
        $("#socks_search_word").val("");
    var param = {
        sport : $("#selected_sport_type").val(),
        gender: $("#selected_gender_type").val(),
        brand: $("#selected_brand_type").val(),
        typology: jQuery("#selected_typology_type_" + jQuery("#total_order_count").val()).val(),
        type : 162,
        current : 0,
        search_word : $("#socks_search_word").val()
    };
    $.ajax({
        type: "POST",
        url: "dbconnect/get_products.php",
        data: param,
        success: function(res){

            if(JSON.parse(res).html != "")
            {
                $("#select_socks").html(JSON.parse(res).html);
                $("#socks_current_page").val(0);
                $("#no_socks_label").hide();
                $("#no_search_socks_label").hide();

                $("#loader_product").fadeIn();
                var img_loaded_count = 0;
                $('#select_socks img').load(function(){
                    img_loaded_count++;
                    if(img_loaded_count == $('#select_socks img').length)
                        $("#loader_product").fadeOut();
                });
                $(".forward").removeAttr('disabled');
            }else {
                $(".forward").attr('disabled','disabled');
                $("#select_socks").html("");
                $("#socks_loadmore").hide();
                $("#no_socks_label").hide();
                $("#no_search_socks_label").show();
            }
            if(JSON.parse(res).final == 1)
                $("#socks_loadmore").hide();
            else
                $("#socks_loadmore").show();
            jQuery("input[name=socks_type]").change(function () {
                jQuery("#selected_socks_type_" + jQuery("#total_order_count").val()).val(this.value);
                jQuery("#selected_socks_type_name_" + jQuery("#total_order_count").val()).val(jQuery(this).parent().children().last().children("span").html());
            });
        }
    });
}

function remove_product(order_id, product_type)
{
    if(product_type == 1)
    {
        if(jQuery(".shirts_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".shirts_product_" + order_id).remove();
        jQuery("#selected_t_shirt_type_" + order_id).val("");
        jQuery("#selected_t_shirt_type_name_" + order_id).val("");
        jQuery("#selected_shirts_img_" + order_id).val("");
        jQuery("#selected_shirts_name_" + order_id).val("");
        jQuery("#selected_order_shirt_" + order_id).val("");
    }
    else if(product_type == 2)
    {
        if(jQuery(".pants_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".pants_product_" + order_id).remove();
        jQuery("#selected_pants_type_" + order_id).val("");
        jQuery("#selected_pants_type_name_" + order_id).val("");
        jQuery("#selected_pants_img_" + order_id).val("");
        jQuery("#selected_pants_name_" + order_id).val("");
        jQuery("#selected_order_pants_" + order_id).val("");
    }
    else if(product_type == 3)
    {
        if(jQuery(".socks_product_" + order_id).length)
            jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
        jQuery(".socks_product_" + order_id).remove();
        jQuery("#selected_socks_type_" + order_id).val("");
        jQuery("#selected_socks_type_name_" + order_id).val("");
        jQuery("#selected_socks_img_" + order_id).val("");
        jQuery("#selected_socks_name_" + order_id).val("");
        jQuery("#selected_order_socks_" + order_id).val("");
    }
    if(!jQuery("#selected_t_shirt_type_" + order_id).val() && !jQuery("#selected_pants_type_" + order_id).val() && !jQuery("#selected_socks_type_" + order_id).val())
    {
        jQuery(".btn_remove_product_" + order_id).remove();
        jQuery(".order_title_" + order_id).remove();
        jQuery("#total_order_count").val(parseInt(jQuery("#total_order_count").val()) - 1);
        if(order_id == 1)
        {
            jQuery("#selected_t_shirt_type_1").val(jQuery("#selected_t_shirt_type_2").val());
            jQuery("#selected_t_shirt_type_name_1").val(jQuery("#selected_t_shirt_type_name_2").val());
            jQuery("#selected_shirts_img_1").val(jQuery("#selected_shirts_img_2").val());
            jQuery("#selected_shirts_name_1").val(jQuery("#selected_shirts_name_2").val());
            jQuery("#selected_order_shirt_1").val(jQuery("#selected_order_shirt_2").val());

            jQuery("#selected_pants_type_1").val(jQuery("#selected_pants_type_2").val());
            jQuery("#selected_pants_type_name_1").val(jQuery("#selected_pants_type_name_2").val());
            jQuery("#selected_pants_img_1").val(jQuery("#selected_pants_img_2").val());
            jQuery("#selected_pants_name_1").val(jQuery("#selected_pants_name_2").val());
            jQuery("#selected_pants_long_1").val(jQuery("#selected_pants_long_2").val());
            jQuery("#selected_order_pants_1").val(jQuery("#selected_order_pants_2").val());

            jQuery("#selected_socks_type_1").val(jQuery("#selected_socks_type_2").val());
            jQuery("#selected_socks_type_name_1").val(jQuery("#selected_socks_type_name_2").val());
            jQuery("#selected_socks_img_1").val(jQuery("#selected_socks_img_2").val());
            jQuery("#selected_socks_name_1").val(jQuery("#selected_socks_name_2").val());
            jQuery("#selected_order_socks_1").val(jQuery("#selected_order_socks_2").val());

            jQuery("#selected_main_canvas_file_name_1").val(jQuery("#selected_main_canvas_file_name_2").val());

            jQuery("#selected_order_typology_1").val(jQuery("#selected_order_typology_2").val());

            jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
            jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
            jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
            jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
            jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

            jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
            jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
            jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
            jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
            jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
            jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

            jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
            jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
            jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
            jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
            jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

            jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

            jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

            jQuery("#selected_t_shirt_type_3").val("");
            jQuery("#selected_t_shirt_type_name_3").val("");
            jQuery("#selected_shirts_img_3").val("");
            jQuery("#selected_shirts_name_3").val("");
            jQuery("#selected_order_shirt_3").val("");

            jQuery("#selected_pants_type_3").val("");
            jQuery("#selected_pants_type_name_3").val("");
            jQuery("#selected_pants_img_3").val("");
            jQuery("#selected_pants_name_3").val("");
            jQuery("#selected_pants_long_3").val("");
            jQuery("#selected_order_pants_3").val("");

            jQuery("#selected_socks_type_3").val("");
            jQuery("#selected_socks_type_name_3").val("");
            jQuery("#selected_socks_img_3").val("");
            jQuery("#selected_socks_name_3").val("");
            jQuery("#selected_order_socks_3").val("");

            jQuery("#selected_main_canvas_file_name_3").val("");

            jQuery("#selected_order_typology_3").val("");
        }

        if(order_id == 2)
        {
            jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
            jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
            jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
            jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
            jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

            jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
            jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
            jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
            jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
            jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
            jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

            jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
            jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
            jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
            jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
            jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

            jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

            jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

            jQuery("#selected_t_shirt_type_3").val("");
            jQuery("#selected_t_shirt_type_name_3").val("");
            jQuery("#selected_shirts_img_3").val("");
            jQuery("#selected_shirts_name_3").val("");
            jQuery("#selected_order_shirt_3").val("");

            jQuery("#selected_pants_type_3").val("");
            jQuery("#selected_pants_type_name_3").val("");
            jQuery("#selected_pants_img_3").val("");
            jQuery("#selected_pants_name_3").val("");
            jQuery("#selected_pants_long_3").val("");
            jQuery("#selected_order_pants_3").val("");

            jQuery("#selected_socks_type_3").val("");
            jQuery("#selected_socks_type_name_3").val("");
            jQuery("#selected_socks_img_3").val("");
            jQuery("#selected_socks_name_3").val("");
            jQuery("#selected_order_socks_3").val("");

            jQuery("#selected_main_canvas_file_name_3").val("");
            
            jQuery("#selected_order_typology_3").val("");
        }
    }
    if(parseInt(jQuery("#cart_alarm").html()) <= 0)
    {
        jQuery("#cart_alarm").html("0");
        jQuery("#tocartpage").hide();
        jQuery("#tocanvas").hide();
        jQuery("#nothing_product").show();
    }

    if(parseInt(jQuery("#total_order_count").val()) >= 3)
        jQuery("#backward").hide();
    else
        jQuery("#backward").show();
}

function remove_order(order_id)
{
    if(jQuery(".shirts_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".shirts_product_" + order_id).remove();
    jQuery("#selected_t_shirt_type_" + order_id).val("");
    jQuery("#selected_t_shirt_type_name_" + order_id).val("");
    jQuery("#selected_shirts_img_" + order_id).val("");
    jQuery("#selected_shirts_name_" + order_id).val("");

    if(jQuery(".pants_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".pants_product_" + order_id).remove();
    jQuery("#selected_pants_type_" + order_id).val("");
    jQuery("#selected_pants_type_name_" + order_id).val("");
    jQuery("#selected_pants_img_" + order_id).val("");
    jQuery("#selected_pants_name_" + order_id).val("");

    if(jQuery(".socks_product_" + order_id).length)
        jQuery("#cart_alarm").html(parseInt(jQuery("#cart_alarm").html()) - 1);
    jQuery(".socks_product_" + order_id).remove();
    jQuery("#selected_socks_type_" + order_id).val("");
    jQuery("#selected_socks_type_name_" + order_id).val("");
    jQuery("#selected_socks_img_" + order_id).val("");
    jQuery("#selected_socks_name_" + order_id).val("");

    jQuery(".btn_remove_product_" + order_id).remove();
    jQuery(".order_title_" + order_id).remove();
    jQuery("#total_order_count").val(parseInt(jQuery("#total_order_count").val()) - 1);

    if(parseInt(jQuery("#cart_alarm").html()) <= 0)
    {
        jQuery("#cart_alarm").html("0");
        jQuery("#tocartpage").hide();
        jQuery("#tocanvas").hide();
        jQuery("#nothing_product").show();
    }

    if(parseInt(jQuery("#total_order_count").val()) >= 3)
        jQuery("#backward").hide();
    else
        jQuery("#backward").show();

    if(order_id == 1)
    {
        jQuery("#selected_t_shirt_type_1").val(jQuery("#selected_t_shirt_type_2").val());
        jQuery("#selected_t_shirt_type_name_1").val(jQuery("#selected_t_shirt_type_name_2").val());
        jQuery("#selected_shirts_img_1").val(jQuery("#selected_shirts_img_2").val());
        jQuery("#selected_shirts_name_1").val(jQuery("#selected_shirts_name_2").val());
        jQuery("#selected_order_shirt_1").val(jQuery("#selected_order_shirt_2").val());

        jQuery("#selected_pants_type_1").val(jQuery("#selected_pants_type_2").val());
        jQuery("#selected_pants_type_name_1").val(jQuery("#selected_pants_type_name_2").val());
        jQuery("#selected_pants_img_1").val(jQuery("#selected_pants_img_2").val());
        jQuery("#selected_pants_name_1").val(jQuery("#selected_pants_name_2").val());
        jQuery("#selected_pants_long_1").val(jQuery("#selected_pants_long_2").val());
        jQuery("#selected_order_pants_1").val(jQuery("#selected_order_pants_2").val());

        jQuery("#selected_socks_type_1").val(jQuery("#selected_socks_type_2").val());
        jQuery("#selected_socks_type_name_1").val(jQuery("#selected_socks_type_name_2").val());
        jQuery("#selected_socks_img_1").val(jQuery("#selected_socks_img_2").val());
        jQuery("#selected_socks_name_1").val(jQuery("#selected_socks_name_2").val());
        jQuery("#selected_order_socks_1").val(jQuery("#selected_order_socks_2").val());

        jQuery("#selected_main_canvas_file_name_1").val(jQuery("#selected_main_canvas_file_name_2").val());

        jQuery("#selected_order_typology_1").val(jQuery("#selected_order_typology_2").val());

        jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
        jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
        jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
        jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
        jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

        jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
        jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
        jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
        jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
        jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
        jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

        jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
        jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
        jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
        jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
        jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

        jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

        jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

        jQuery("#selected_t_shirt_type_3").val("");
        jQuery("#selected_t_shirt_type_name_3").val("");
        jQuery("#selected_shirts_img_3").val("");
        jQuery("#selected_shirts_name_3").val("");
        jQuery("#selected_order_shirt_3").val("");

        jQuery("#selected_pants_type_3").val("");
        jQuery("#selected_pants_type_name_3").val("");
        jQuery("#selected_pants_img_3").val("");
        jQuery("#selected_pants_name_3").val("");
        jQuery("#selected_pants_long_3").val("");
        jQuery("#selected_order_pants_3").val("");

        jQuery("#selected_socks_type_3").val("");
        jQuery("#selected_socks_type_name_3").val("");
        jQuery("#selected_socks_img_3").val("");
        jQuery("#selected_socks_name_3").val("");
        jQuery("#selected_order_socks_3").val("");

        jQuery("#selected_main_canvas_file_name_3").val("");

        jQuery("#selected_order_typology_3").val("");
    }

    if(order_id == 2)
    {
        jQuery("#selected_t_shirt_type_2").val(jQuery("#selected_t_shirt_type_3").val());
        jQuery("#selected_t_shirt_type_name_2").val(jQuery("#selected_t_shirt_type_name_3").val());
        jQuery("#selected_shirts_img_2").val(jQuery("#selected_shirts_img_3").val());
        jQuery("#selected_shirts_name_2").val(jQuery("#selected_shirts_name_3").val());
        jQuery("#selected_order_shirt_2").val(jQuery("#selected_order_shirt_3").val());

        jQuery("#selected_pants_type_2").val(jQuery("#selected_pants_type_3").val());
        jQuery("#selected_pants_type_name_2").val(jQuery("#selected_pants_type_name_3").val());
        jQuery("#selected_pants_img_2").val(jQuery("#selected_pants_img_3").val());
        jQuery("#selected_pants_name_2").val(jQuery("#selected_pants_name_3").val());
        jQuery("#selected_pants_long_2").val(jQuery("#selected_pants_long_3").val());
        jQuery("#selected_order_pants_2").val(jQuery("#selected_order_pants_3").val());

        jQuery("#selected_socks_type_2").val(jQuery("#selected_socks_type_3").val());
        jQuery("#selected_socks_type_name_2").val(jQuery("#selected_socks_type_name_3").val());
        jQuery("#selected_socks_img_2").val(jQuery("#selected_socks_img_3").val());
        jQuery("#selected_socks_name_2").val(jQuery("#selected_socks_name_3").val());
        jQuery("#selected_order_socks_2").val(jQuery("#selected_order_socks_3").val());

        jQuery("#selected_main_canvas_file_name_2").val(jQuery("#selected_main_canvas_file_name_3").val());

        jQuery("#selected_order_typology_2").val(jQuery("#selected_order_typology_3").val());

        jQuery("#selected_t_shirt_type_3").val("");
        jQuery("#selected_t_shirt_type_name_3").val("");
        jQuery("#selected_shirts_img_3").val("");
        jQuery("#selected_shirts_name_3").val("");
        jQuery("#selected_order_shirt_3").val("");

        jQuery("#selected_pants_type_3").val("");
        jQuery("#selected_pants_type_name_3").val("");
        jQuery("#selected_pants_img_3").val("");
        jQuery("#selected_pants_name_3").val("");
        jQuery("#selected_pants_long_3").val("");
        jQuery("#selected_order_pants_3").val("");

        jQuery("#selected_socks_type_3").val("");
        jQuery("#selected_socks_type_name_3").val("");
        jQuery("#selected_socks_img_3").val("");
        jQuery("#selected_socks_name_3").val("");
        jQuery("#selected_order_socks_3").val("");

        jQuery("#selected_main_canvas_file_name_3").val("");
        
        jQuery("#selected_order_typology_3").val("");
    }
}