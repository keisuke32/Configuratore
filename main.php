<?php
	header("Access-Control-Allow-Origin: https://amministrazionedigitale.org");
	require_once "layout/header.php";
?>
<?php
	if(isset($_COOKIE["user"])) {
		//print_r($_COOKIE["user"]);
	}else {
		$url = "index.php";
		if(headers_sent())
		{
			echo "<script>document.location.href='".$url."'</script>";
		}
		else
		{
		    header("location: ".$url);
		}
	}
?>
	<main>
		<div class="container">
			<div id="wizard_container">
				<form name="main-form" id="wrapped" method="POST" action="final.php" target="_blank">
					<input id="website" name="website" type="text" value="">
					<!-- Leave for security protection, read docs for details -->
					<div id="loader_product">
						<div data-loader="circle-side-product"></div>
					</div>
					<div id="middle-wizard">
						
						<div class="step">
							<div class="question_title">
								<h3>Seleziona lo Sport</h3>
							</div>
							<input type="hidden" name="selected_sport_type" id="selected_sport_type">
							<input type="hidden" name="selected_sport_type_name" id="selected_sport_type_name">
							<div class="row justify-content-center">
								<div class="col-6 col-md-4 ">
									<div class="item">
										<input data-label="Calcio" id="answer_1_group_1" type="radio" name="sport_type" value="207" class="required">
										<label for="answer_1_group_1"><img src="img/sport/soccer.png" alt="" class="img-fluid"><strong>Calcio</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 ">
									<div class="item">
										<input data-label="Basket" id="answer_2_group_1" name="sport_type" type="radio" value="209" class="required">
										<label for="answer_2_group_1"><img src="img/sport/basket.png" alt="" class="img-fluid"><strong>Basket</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 ">
									<div class="item">
										<input data-label="Tennis" id="answer_3_group_1" name="sport_type" type="radio" value="208" class="required">
										<label for="answer_3_group_1"><img src="img/sport/tennis.png" alt="" class="img-fluid"><strong>Tennis</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 ">
									<div class="item">
										<input data-label="Volley" id="answer_4_group_1" name="sport_type" type="radio" value="210" class="required">
										<label for="answer_4_group_1"><img src="img/sport/volley.png" alt="" class="img-fluid"><strong>Volley</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 ">
									<div class="item">
										<input data-label="Running" id="answer_5_group_1" name="sport_type" type="radio" value="212" class="required">
										<label for="answer_5_group_1"><img src="img/sport/running.png" alt="" class="img-fluid"><strong>Running</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 ">
									<div class="item">
										<input data-label="Fitness" id="answer_6_group_1" name="sport_type" type="radio" value="211" class="required">
										<label for="answer_6_group_1"><img src="img/sport/fitness.png" alt="" class="img-fluid"><strong>Fitness</strong></label>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Seleziona Tipologia</h3>
								<h5 class="breadcrumb_text"></h5>
							</div>
							<input type="hidden" name="selected_gender_type" id="selected_gender_type">
							<input type="hidden" name="selected_gender_type_name" id="selected_gender_type_name">
							<div class="row justify-content-center">
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-label="male" id="answer_1_group_2" type="radio" name="gender_type" value="213" class="required">
										<label for="answer_1_group_2"><img src="img/sport/man.png" alt="" class="img-fluid"><strong>Uomo</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-label="female"  id="answer_2_group_2" name="gender_type" type="radio" value="214" class="required">
										<label for="answer_2_group_2"><img src="img/sport/woman.png" alt="" class="img-fluid"><strong>Donna</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-label="kid"  id="answer_3_group_2" name="gender_type" type="radio" value="215" class="required">
										<label for="answer_3_group_2"><img src="img/sport/kid.png" alt="" class="img-fluid"><strong>Bambino</strong></label>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Seleziona il Brand</h3>
								<h5 class="breadcrumb_text"></h5>
							</div>
							<input type="hidden" name="selected_brand_type" id="selected_brand_type">
							<input type="hidden" name="selected_brand_type_name" id="selected_brand_type_name">
							<div class="row justify-content-center">
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="adidas" id="answer_1_group_3" type="radio" name="brand_type" value="196" class="required">
										<label for="answer_1_group_3"><img src="img/brand/adidas.jpg" class="img-fluid"><strong>ADIDAS</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="gems"  id="answer_2_group_3" name="brand_type" type="radio" value="198" class="required">
										<label for="answer_2_group_3"><img src="img/brand/gems.jpg" alt="" class="img-fluid"><strong>GEMS</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="jako" id="answer_3_group_3" name="brand_type" type="radio" value="199" class="required">
										<label for="answer_3_group_3"><img src="img/brand/jako.jpg" alt="" class="img-fluid"><strong>JAKO</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="joma" id="answer_4_group_3" name="brand_type" type="radio" value="200" class="required">
										<label for="answer_4_group_3"><img src="img/brand/joma.jpg" alt="" class="img-fluid"><strong>JOMA</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="kappa" id="answer_5_group_3" name="brand_type" type="radio" value="201" class="required">
										<label for="answer_5_group_3"><img src="img/brand/kappa.jpg" alt="" class="img-fluid"><strong>KAPPA</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="lotto" id="answer_6_group_3" name="brand_type" type="radio" value="202" class="required">
										<label for="answer_6_group_3"><img src="img/brand/lotto.jpg" alt="" class="img-fluid"><strong>LOTTO</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="mizuno" id="answer_7_group_3" name="brand_type" type="radio" value="203" class="required">
										<label for="answer_7_group_3"><img src="img/brand/mizuno.jpg" alt="" class="img-fluid"><strong>MIZUNO</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="nike" id="answer_8_group_3" name="brand_type" type="radio" value="204" class="required">
										<label for="answer_8_group_3"><img src="img/brand/nike.jpg" alt="" class="img-fluid"><strong>NIKE</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="puma" id="answer_9_group_3" name="brand_type" type="radio" value="205" class="required">
										<label for="answer_9_group_3"><img src="img/brand/puma.jpg" alt="" class="img-fluid"><strong>PUMA</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4 col-lg-3">
									<div class="item">
										<input data-label="sixtus" id="answer_10_group_3" name="brand_type" type="radio" value="206" class="required">
										<label for="answer_10_group_3"><img src="img/brand/sixtus.jpg" alt="" class="img-fluid"><strong>SIXTUS</strong></label>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->


						<div class="step">
							<div class="question_title">
								<h3>Scegli la Tipologia </h3>
								<h5 class="breadcrumb_text"></h5>
							</div>
							<div style="padding-top: 15px;justify-content: center;display: inline;display: none; text-align: center;" id="unavailable_typology">
								<p class="mb-2" style="font-size:16px;">Siamo spiacenti, non ci sono abbastanza prodotti per configurare un <b>Kit:</b></p>
								<p style="font-size:16px;" id="unavailable_typology_name">TIPOLOGY NAMES</p>
							</div>
							<input type="" name="total_order_count" id="total_order_count" value="0">
							<input type="hidden" name="selected_typology_type_1" id="selected_typology_type_1">
							<input type="hidden" name="selected_typology_type_name_1" id="selected_typology_type_name_1">
							<input type="hidden" name="selected_typology_type_2" id="selected_typology_type_2">
							<input type="hidden" name="selected_typology_type_name_2" id="selected_typology_type_name_2">
							<input type="hidden" name="selected_typology_type_3" id="selected_typology_type_3">
							<input type="hidden" name="selected_typology_type_name_3" id="selected_typology_type_name_3">
							<div class="row justify-content-center">
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-price="" data-label="" id="rapp" type="radio" name="typology_type" value="262" class="required">
										<label for="rapp" id="label_rapp"><img src="img/sport/1.png" alt="" class="img-fluid"><strong>Rappresentanza</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-price="" data-label="" id="camp" type="radio" name="typology_type" value="263" class="required">
										<label for="camp" id="label_camp"><img src="img/sport/2.png" alt="" class="img-fluid"><strong>Campo</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-price="" data-label="" id="alle" type="radio" name="typology_type" value="264" class="required">
										<label for="alle" id="label_alle"><img src="img/sport/3.png" alt="" class="img-fluid"><strong>Allenamento</strong></label>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Scegli la Tipologia </h3>
								<h5 class="breadcrumb_text"></h5>
							</div>
							<input type="hidden" name="selected_clothes_type_1" id="selected_clothes_type_1">
							<input type="hidden" name="selected_clothes_type_name_1" id="selected_clothes_type_name_1">
							<input type="hidden" name="selected_clothes_type_2" id="selected_clothes_type_2">
							<input type="hidden" name="selected_clothes_type_name_2" id="selected_clothes_type_name_2">
							<input type="hidden" name="selected_clothes_type_3" id="selected_clothes_type_3">
							<input type="hidden" name="selected_clothes_type_name_3" id="selected_clothes_type_name_3">
							<div class="row justify-content-center">
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-price="" data-label="" id="shirt_clothes" type="radio" name="clothes_type" value="157" class="required">
										<label for="shirt_clothes" id="label_shirt_clothes"><img src="img/sport/shirt.png" alt="" class="img-fluid"><strong>Maglie</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-price="" data-label="" id="pants_clothes" type="radio" name="clothes_type" value="161" class="required">
										<label for="pants_clothes" id="label_pants_clothes"><img src="img/sport/pants.png" alt="" class="img-fluid"><strong>Pantaloni</strong></label>
									</div>
								</div>
								<div class="col-6 col-md-4">
									<div class="item">
										<input data-price="" data-label="" id="socks_clothes" type="radio" name="clothes_type" value="162" class="required">
										<label for="socks_clothes" id="label_socks_clothes"><img src="img/sport/socks.png" alt="" class="img-fluid"><strong>Calze</strong></label>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Scegli la T-shirt</h3>
								<h5 class="breadcrumb_text"></h5>
								<div class="question_title search_box_header form-group">
									<input type="search" class="form-control" id="shirt_search_word" placeholder="Cerca per Nome o codice prodotto">
									<button type="button" onclick="search_shirts(0)">Cerca</button>
									<button type="button" onclick="search_shirts(1)" class="reset_button">Reset</button>
								</div>
							</div>
							
							<input type="hidden" name="selected_t_shirt_type_1" id="selected_t_shirt_type_1">
							<input type="hidden" name="selected_t_shirt_type_name_1" id="selected_t_shirt_type_name_1">
							<input type="hidden" name="selected_t_shirt_type_2" id="selected_t_shirt_type_2">
							<input type="hidden" name="selected_t_shirt_type_name_2" id="selected_t_shirt_type_name_2">
							<input type="hidden" name="selected_t_shirt_type_3" id="selected_t_shirt_type_3">
							<input type="hidden" name="selected_t_shirt_type_name_3" id="selected_t_shirt_type_name_3">
							<div class="row" id="select_t_shirt">
							</div>
							<div class="load_more" style="text-align: center;">
								<input type="hidden" name="shirt_current_page" id="shirt_current_page" value="0">
								<button type="button" name="shirt_loadmore" id="shirt_loadmore" class="button_default" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
								<label style="font-size: 24px;" id="no_shirts_label">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere la T-shirt</label>
								<label style="font-size: 24px;display: none;" id="no_search_shirts_label">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Scegli la taglia, il colore e la quantità</h3>
								<h5 class="breadcrumb_text"></h5>
							</div>
							<input type="hidden" name="selected_shirts_img_1" id="selected_shirts_img_1">
							<input type="hidden" name="selected_shirts_name_1" id="selected_shirts_name_1">
							<input type="hidden" name="selected_shirts_img_2" id="selected_shirts_img_2">
							<input type="hidden" name="selected_shirts_name_2" id="selected_shirts_name_2">
							<input type="hidden" name="selected_shirts_img_3" id="selected_shirts_img_3">
							<input type="hidden" name="selected_shirts_name_3" id="selected_shirts_name_3">
							<div class="row justify-content-center">
								<div class="col-md-6" id="selected_t_shirt">
								</div>
								<div class="col-md-6 mt-4">
									<div class="box_general">
										<div class="question_title mt-4">
											<h4>Descrizione</h4>
											<p style="color:#000000;" id="t_shirt_description"></p>
										</div>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Scegli il Pantaloncino</h3>
								<h5 class="breadcrumb_text"></h5>
								<div class="question_title search_box_header form-group">
									<input type="search" class="form-control" id="pants_search_word" placeholder="Cerca per Nome o codice prodotto">
									<button type="button" onclick="search_pants(0)">Cerca</button>
									<button type="button" onclick="search_pants(1)" class="reset_button">Reset</button>
								</div>
							</div>
							<input type="hidden" name="selected_pants_type_1" id="selected_pants_type_1">
							<input type="hidden" name="selected_pants_type_name_1" id="selected_pants_type_name_1">
							<input type="hidden" name="selected_pants_type_2" id="selected_pants_type_2">
							<input type="hidden" name="selected_pants_type_name_2" id="selected_pants_type_name_2">
							<input type="hidden" name="selected_pants_type_3" id="selected_pants_type_3">
							<input type="hidden" name="selected_pants_type_name_3" id="selected_pants_type_name_3">
							<div class="row" id="select_pants">
							</div>
							<div class="load_more" style="text-align: center;">
								<input type="hidden" name="pants_current_page" id="pants_current_page" value="0">
								<button type="button" name="pants_loadmore" id="pants_loadmore" class="button_default" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
								<label style="font-size: 24px;" id="no_pants_label">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere i Pantaloncini</label>
								<label style="font-size: 24px;display: none;" id="no_search_pants_label">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Scegli la taglia, il colore e la quantità</h3>
								<h5 class="breadcrumb_text"></h5>
							</div>
							<input type="hidden" name="selected_pants_img_1" id="selected_pants_img_1">
							<input type="hidden" name="selected_pants_name_1" id="selected_pants_name_1">
							<input type="hidden" name="selected_pants_long_1" id="selected_pants_long_1">
							<input type="hidden" name="selected_pants_img_2" id="selected_pants_img_2">
							<input type="hidden" name="selected_pants_name_2" id="selected_pants_name_2">
							<input type="hidden" name="selected_pants_long_2" id="selected_pants_long_2">
							<input type="hidden" name="selected_pants_img_3" id="selected_pants_img_3">
							<input type="hidden" name="selected_pants_name_3" id="selected_pants_name_3">
							<input type="hidden" name="selected_pants_long_3" id="selected_pants_long_3">
							<div class="row justify-content-center">
								<div class="col-md-6" id="selected_pants">
								</div>
								<div class="col-md-6 mt-4">
									<div class="box_general">
										<div class="question_title mt-4">
											<h4>Descrizione</h4>
											<p style="color:#000000;" id="pants_description"></p>
										</div>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Scegli il Pantaloncino</h3>
								<h5 class="breadcrumb_text"></h5>
								<div class="question_title search_box_header form-group">
									<input type="search" class="form-control" id="socks_search_word" placeholder="Cerca per Nome o codice prodotto">
									<button type="button" onclick="search_socks(0)">Cerca</button>
									<button type="button" onclick="search_socks(1)" class="reset_button">Reset</button>
								</div>
							</div>
							<input type="hidden" name="selected_socks_type_1" id="selected_socks_type_1">
							<input type="hidden" name="selected_socks_type_name_1" id="selected_socks_type_name_1">
							<input type="hidden" name="selected_socks_type_2" id="selected_socks_type_2">
							<input type="hidden" name="selected_socks_type_name_2" id="selected_socks_type_name_2">
							<input type="hidden" name="selected_socks_type_3" id="selected_socks_type_3">
							<input type="hidden" name="selected_socks_type_name_3" id="selected_socks_type_name_3">
							<div class="row" id="select_socks">
							</div>
							<div class="load_more" style="text-align: center;">
								<input type="hidden" name="socks_current_page" id="socks_current_page" value="0">
								<button type="button" name="socks_loadmore" id="socks_loadmore" class="button_default" style="margin-top: 20px;">MOSTRA PIÙ PRODOTTI</button>
								<label style="font-size: 24px;" id="no_socks_label">Nessun prodotto trovato. Per favore <b>completa la configurazione</b> senza includere i Calzettoni</label>
								<label style="font-size: 24px;display: none;" id="no_search_socks_label">La tua ricerca non ha prodotto risultati, effettua un'altra ricerca</label>
							</div>
							<!-- /row-->
						</div>

						<!-- /step -->

						<div class="step">
							<div class="question_title">
								<h3>Scegli la taglia, il colore e la quantità</h3>
								<h5 class="breadcrumb_text"></h5>
							</div>
							<input type="hidden" name="selected_socks_img_1" id="selected_socks_img_1">
							<input type="hidden" name="selected_socks_name_1" id="selected_socks_name_1">
							<input type="hidden" name="selected_socks_img_2" id="selected_socks_img_2">
							<input type="hidden" name="selected_socks_name_2" id="selected_socks_name_2">
							<input type="hidden" name="selected_socks_img_3" id="selected_socks_img_3">
							<input type="hidden" name="selected_socks_name_3" id="selected_socks_name_3">
							<div class="row justify-content-center">
								<div class="col-md-6" id="selected_socks">
								</div>
								<div class="col-md-6 mt-4">
									<div class="box_general">
										<div class="question_title mt-4">
											<h4>Descrizione</h4>
											<p style="color:#000000;" id="socks_description"></p>
										</div>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /step -->
						<!-- Last step ============================== -->
						<div class="submit step">
							<div class="question_title">
								<h3>Checkout</h3>
							</div>
							<input type="hidden" name="selected_main_canvas_file_name_1" id="selected_main_canvas_file_name_1">
							<input type="hidden" name="selected_main_canvas_file_name_2" id="selected_main_canvas_file_name_2">
							<input type="hidden" name="selected_main_canvas_file_name_3" id="selected_main_canvas_file_name_3">
							<div class="row">
								<div class="col-lg-6">
									<div class="box_general" style="text-align:center;" id="final_image">
										<canvas style="background: white;" id="canvas_element"></canvas>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="box_general">
										<div class="question_title">
											<h4>Riepilogo Configurazione</h4>
										</div>
										<div id="order_summary">
										</div>
										<div id="totale_ordine">
											<h4 class="text-center">Invia la configurazione e <b>scopri lo sconto</b> a te dedicato!</h4>
										</div>
										<div style="text-align: center;padding-top: 20px;">
											<button type="submit" class="start_wizard" id="gotoFinalPage">VISUALIZZA L'ANTEPRIMA DELLE TUE CONFIGURAZIONI</button>
										</div>
									</div>
								</div>
							</div>
							<!-- /row -->
						</div>
						<!-- /Last step ============================== -->
						<div class="cart_step step">
							<div class="question_title">
								<h3>Carrello</h3>
							</div>
							<div style="text-align: center; display: none;" id="nothing_product">
								<h4>Nessun prodotto nel carrello</h4>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="box_general" id="order_product_list">
									</div>
								</div>
							</div>
							<!-- /row -->
						</div>
					</div>
					<!-- /middle-wizard -->
					<div id="bottom-wizard">
						<div class="float-right clearfix">
							<button type="button" name="tootherorder" id="tootherorder" class="tootherorder" style="display: none;">CONFIGURA UN ALTRO KIT</button>
							<button type="button" name="tocanvas" id="tocanvas" class="tocanvas" style="display: none;">Termina Configurazione</button>
							<button type="button" name="backward" id="backward" class="backward">Precedente</button>
							<button type="button" name="forward" id="forward" class="forward">Successivo</button>
							<a href="#" data-toggle="modal" data-target="#final-modal" class="tofinalmodal" style="display: none;" id="gofinal">Invia Configurazione</a>
						</div>
					</div>
					<!-- /bottom-wizard -->
					<input type="hidden" id="hidden_total" name="hidden_total">
					<!-- /Hidden total input -->
				</form>
			</div>
			<!-- /Wizard container -->
		</div>
		<!-- /Container -->
	</main>
	<!-- /main -->
	
	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /cd-nav-trigger -->
	
	<!-- Modal terms -->
	<div class="modal fade" id="final-modal" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="termsLabel">Conferma o modifica i tuoi dati prima di continuare</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form name="example-1" id="wrapped" method="POST" action="mailer_final.php">
						<div class="box_general box-form" style="margin-top: 0;">
							<input type="hidden" name="selected_order_sport" id="selected_order_sport">
							<input type="hidden" name="selected_order_gender" id="selected_order_gender">
							<input type="hidden" name="selected_order_brand" id="selected_order_brand">
							<input type="hidden" name="selected_order_typology_1" id="selected_order_typology_1">
							<input type="hidden" name="selected_order_typology_2" id="selected_order_typology_2">
							<input type="hidden" name="selected_order_typology_3" id="selected_order_typology_3">
							<input type="hidden" name="selected_order_shirt_1" id="selected_order_shirt_1">
							<input type="hidden" name="selected_order_shirt_2" id="selected_order_shirt_2">
							<input type="hidden" name="selected_order_shirt_3" id="selected_order_shirt_3">
							<input type="hidden" name="selected_order_pants_1" id="selected_order_pants_1">
							<input type="hidden" name="selected_order_pants_2" id="selected_order_pants_2">
							<input type="hidden" name="selected_order_pants_3" id="selected_order_pants_3">
							<input type="hidden" name="selected_order_socks_1" id="selected_order_socks_1">
							<input type="hidden" name="selected_order_socks_2" id="selected_order_socks_2">
							<input type="hidden" name="selected_order_socks_3" id="selected_order_socks_3">
							<input type="hidden" name="merge_all_canvas_file" id="merge_all_canvas_file">
							<div class="form-group">
								<input type="text" id="first_last_name" name="first_last_name" class="required form-control" placeholder="Nome e Cognome" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['name']):'' ?>">
							</div>
							<div class="form-group">
								<input type="email" id="email" name="email" class="required form-control" placeholder="Inserisci la tua E-mail" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['email']):'' ?>">
							</div>
							<div class="form-group">
								<input type="text" id="company_name" name="company_name" class="required form-control" placeholder="Ragione Sociale" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['company']):'' ?>">
							</div>
							<div class="form-group">
								<input type="number" id="vat_number" name="vat_number" class="form-control" placeholder="Partita IVA" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['vat']):'' ?>">
							</div>
							<div class="form-group">
								<input type="text" id="address" name="address" class="required form-control" placeholder="Indirizzo" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['address']):'' ?>">
							</div>
							<div class="form-group add_bottom_30">
								<div class="styled-select">
									<select class="required" name="country" id="country">
										<option value=""<?=json_decode($_COOKIE['user'],true)['country'] == '' ? ' selected="selected"' : '';?>>Regione</option>
										<option value="Abruzzo"<?=json_decode($_COOKIE['user'],true)['country'] == 'Abruzzo' ? ' selected="selected"' : '';?>>Abruzzo</option>
										<option value="Basilicata"<?=json_decode($_COOKIE['user'],true)['country'] == 'Basilicata' ? ' selected="selected"' : '';?>>Basilicata</option>
										<option value="Calabria"<?=json_decode($_COOKIE['user'],true)['country'] == 'Calabria' ? ' selected="selected"' : '';?>>Calabria</option>
										<option value="Campania"<?=json_decode($_COOKIE['user'],true)['country'] == 'Campania' ? ' selected="selected"' : '';?>>Campania</option>
										<option value="Emilia Romagna"<?=json_decode($_COOKIE['user'],true)['country'] == 'Emilia Romagna' ? ' selected="selected"' : '';?>>Emilia Romagna</option>
										<option value="Friuli Venezia Giulia"<?=json_decode($_COOKIE['user'],true)['country'] == 'Friuli Venezia Giulia' ? ' selected="selected"' : '';?>>Friuli Venezia Giulia</option>
										<option value="Lazio"<?=json_decode($_COOKIE['user'],true)['country'] == 'Lazio' ? ' selected="selected"' : '';?>>Lazio</option>
										<option value="Liguria"<?=json_decode($_COOKIE['user'],true)['country'] == 'Liguria' ? ' selected="selected"' : '';?>>Liguria</option>
										<option value="Lombardia"<?=json_decode($_COOKIE['user'],true)['country'] == 'Lombardia' ? ' selected="selected"' : '';?>>Lombardia</option>
										<option value="Marche"<?=json_decode($_COOKIE['user'],true)['country'] == 'Marche' ? ' selected="selected"' : '';?>>Marche</option>
										<option value="Molise"<?=json_decode($_COOKIE['user'],true)['country'] == 'Molise' ? ' selected="selected"' : '';?>>Molise</option>
										<option value="Piemonte"<?=json_decode($_COOKIE['user'],true)['country'] == 'Piemonte' ? ' selected="selected"' : '';?>>Piemonte</option>
										<option value="Provincia Autonoma di Bolzano"<?=json_decode($_COOKIE['user'],true)['country'] == 'Provincia Autonoma di Bolzano' ? ' selected="selected"' : '';?>>Provincia Autonoma di Bolzano</option>
										<option value="Provincia Autonoma di Trento"<?=json_decode($_COOKIE['user'],true)['country'] == 'Provincia Autonoma di Trento' ? ' selected="selected"' : '';?>>Provincia Autonoma di Trento</option>
										<option value="Puglia"<?=json_decode($_COOKIE['user'],true)['country'] == 'Puglia' ? ' selected="selected"' : '';?>>Puglia</option>
										<option value="Sardegna"<?=json_decode($_COOKIE['user'],true)['country'] == 'Sardegna' ? ' selected="selected"' : '';?>>Sardegna</option>
										<option value="Sicilia"<?=json_decode($_COOKIE['user'],true)['country'] == 'Sicilia' ? ' selected="selected"' : '';?>>Sicilia</option>
										<option value="Toscana"<?=json_decode($_COOKIE['user'],true)['country'] == 'Toscana' ? ' selected="selected"' : '';?>>Toscana</option>
										<option value="Umbria"<?=json_decode($_COOKIE['user'],true)['country'] == 'Umbria' ? ' selected="selected"' : '';?>>Umbria</option>
										<option value="Valle d Aosta"<?=json_decode($_COOKIE['user'],true)['country'] == 'Valle d Aosta' ? ' selected="selected"' : '';?>>Valle d'Aosta</option>
										<option value="Veneto"<?=json_decode($_COOKIE['user'],true)['country'] == 'Veneto' ? ' selected="selected"' : '';?>>Veneto</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<input type="number" id="telephone" name="telephone" class="form-control" placeholder="Insersci un recapito telefonico" value="<?php echo (isset($_COOKIE['user']))?(json_decode($_COOKIE['user'],true)['telephone']):'' ?>">
							</div>
							<button type="submit" class="start_wizard" id="btn_finish">CONFERMA DATI</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Modal terms -->

<?php
	require_once "layout/footer.php";
?>