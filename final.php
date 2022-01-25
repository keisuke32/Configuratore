<?php
  require_once "layout/header.php";
?>
<?php
    $canvas_src_1 = "";
    $canvas_src_2 = "";
    $canvas_src_3 = "";

    if($_POST["selected_main_canvas_file_name_1"])
        $canvas_src_1 = "image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["selected_main_canvas_file_name_1"] . ".png";
    if($_POST["selected_main_canvas_file_name_2"])
        $canvas_src_2 = "image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["selected_main_canvas_file_name_2"] . ".png";
    if($_POST["selected_main_canvas_file_name_3"])
        $canvas_src_3 = "image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["selected_main_canvas_file_name_3"] . ".png";
?>
<div id="success">      
      <main>
        <div class="container">
        	<div class="question_title">
				<h3>Anteprima</h3>
			</div>
            <div class="row justify-content-center">
                <div class="col-12" style="display: flex;justify-content: center;">
                    <div class="col-md-4 order_product">
                    	<div class="row">
                            <?php
                                if($canvas_src_1 != "")
                                {
                            ?>
                    		      <img src="<?php echo $canvas_src_1 ?>" class="img-fluid">
                            <?php
                                }
                            ?>
                    	</div>
                    </div>
                    <div class="col-md-4 order_product">
                    	<div class="row">
                            <?php
                                if($canvas_src_2 != "")
                                {
                            ?>
                                  <img src="<?php echo $canvas_src_2 ?>" class="img-fluid">
                            <?php
                                }
                            ?>
                    	</div>
                    </div>
                    <div class="col-md-4 order_product">
                    	<div class="row">
                            <?php
                                if($canvas_src_3 != "")
                                {
                            ?>
                                  <img src="<?php echo $canvas_src_3 ?>" class="img-fluid">
                            <?php
                                }
                            ?>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Container -->
      </main>
    </div>
<?php
  require_once "layout/footer.php";
?>