<?php
  require_once "layout/header.php";
?>
<?php
  require "phpmailer/src/PHPMailer.php";
  require "phpmailer/src/Exception.php";
  require "phpmailer/src/SMTP.php";

  sendMailToAdmin("info@amministrazionedigitale.org", "consulenze.basile@gmail.com");
  sendMailToUser("info@amministrazionedigitale.org", $_POST["email"]);
  saveOrderToCsvFile();

  function sendMailToAdmin($fromUser, $toUser)
  {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "mail.amministrazionedigitale.org";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = 'info@amministrazionedigitale.org';                // SMTP username
    $mail->Password = 'thwQyREc@~{U';                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to
    $mail->Port = 587;                                   

    $mail->setFrom($fromUser, 'GGTEAMWEAR');

    $mail->addAddress($toUser);

    $mail->isHTML(true);

    $mail->Subject = "Nuova richiesta di Configurazione";

    if($_POST["selected_order_shirt_1"])
      $shirt_order_detail_1 = json_decode($_POST["selected_order_shirt_1"]);
    if($_POST["selected_order_pants_1"])
      $pants_order_detail_1 = json_decode($_POST["selected_order_pants_1"]);
    if($_POST["selected_order_socks_1"])
      $socks_order_detail_1 = json_decode($_POST["selected_order_socks_1"]);

    if($_POST["selected_order_shirt_2"])
      $shirt_order_detail_2 = json_decode($_POST["selected_order_shirt_2"]);
    if($_POST["selected_order_pants_2"])
      $pants_order_detail_2 = json_decode($_POST["selected_order_pants_2"]);
    if($_POST["selected_order_socks_2"])
      $socks_order_detail_2 = json_decode($_POST["selected_order_socks_2"]);

    if($_POST["selected_order_shirt_3"])
      $shirt_order_detail_3 = json_decode($_POST["selected_order_shirt_3"]);
    if($_POST["selected_order_pants_3"])
      $pants_order_detail_3 = json_decode($_POST["selected_order_pants_3"]);
    if($_POST["selected_order_socks_3"])
      $socks_order_detail_3 = json_decode($_POST["selected_order_socks_3"]);

    $message_admin = '<!DOCTYPE html>
    <html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, "sans-serif";-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
    <head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    </head>
    <body>
      <div style="text-align: center; max-width: 600px; margin: 0 auto; background-color: #ffffff;">
        <img style="max-width:200px; padding-bottom: 30px;" src="https://amministrazionedigitale.org/ggteamwear/media/2020/09/logo350px.png">
        <h1 style="font-size: 25px;">Ciao Admin!</h1>
        <h1 style="font-size: 25px;">Un utente ha appena inviato una configurazione</h1>
        <div style="text-align: center; font-size:16px;">
          <p>Di seguito i dettagli:</p>
          <p><b>Nome e Cognome : </b>' . $_POST["first_last_name"] . '</p>
          <p><b>Ragione Sociale : </b>' . $_POST["company_name"] . '</p>
          <p><b>Partita IVA : </b>' . $_POST["vat_number"] . '</p>
          <p><b>Indirizzo : </b>' . $_POST["address"] . '</p>
          <p><b>Regione : </b>' . $_POST["country"] . '</p>
          <p><b>Telefono : </b>' . $_POST["telephone"] . '</p>
          <p><b>Email : </b>' . $_POST["email"] . '</p><br>
          <p>Di seguito i dettagli:</p>
          <p><b>Sport : </b>' . $_POST["selected_order_sport"] . '</p>
          <p><b>Gender : </b>' . $_POST["selected_order_gender"] . '</p>
          <p><b>Brand : </b>' . $_POST["selected_order_brand"] . '</p>';

    if($_POST["selected_order_typology_1"])
    {
      $message_admin .= '<p><b>Tipologia_1 Kit : </b>' . $_POST["selected_order_typology_1"] .'</p>';
      if($shirt_order_detail_1)
      {
        $message_admin .= '<p><b>Nome Prodotto Maglia : </b>' . $shirt_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_1->sku . '</p>';
      }

      if($pants_order_detail_1)
      {
        $message_admin .= '<p><b>Nome Prodotto Pantalone : </b>' . $pants_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_1->sku . '</p>';
      }

      if($socks_order_detail_1)
      {
        $message_admin .= '<p><b>Nome Prodotto Calze : </b>' . $socks_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_1->sku . '</p>';
      }
    }

    if($_POST["selected_order_typology_2"])
    {
      $message_admin .= '<p><b>Tipologia_2 Kit : </b>' . $_POST["selected_order_typology_2"] .'</p>';
      if($shirt_order_detail_2)
      {
        $message_admin .= '<p><b>Nome Prodotto Maglia : </b>' . $shirt_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_2->sku . '</p>';
      }

      if($pants_order_detail_2)
      {
        $message_admin .= '<p><b>Nome Prodotto Pantalone : </b>' . $pants_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_2->sku . '</p>';
      }

      if($socks_order_detail_2)
      {
        $message_admin .= '<p><b>Nome Prodotto Calze : </b>' . $socks_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_2->sku . '</p>';
      }
    }

    if($_POST["selected_order_typology_3"])
    {
      $message_admin .= '<p><b>Tipologia_3 Kit : </b>' . $_POST["selected_order_typology_3"] .'</p>';
      if($shirt_order_detail_3)
      {
        $message_admin .= '<p><b>Nome Prodotto Maglia : </b>' . $shirt_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_3->sku . '</p>';
      }

      if($pants_order_detail_3)
      {
        $message_admin .= '<p><b>Nome Prodotto Pantalone : </b>' . $pants_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_3->sku . '</p>';
      }

      if($socks_order_detail_3)
      {
        $message_admin .= '<p><b>Nome Prodotto Calze : </b>' . $socks_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_3->sku . '</p>';
      }
    }

    $message_admin .= '</div>  
        <div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
          <p style="font-size: 14px;">© 2020 <b>GGTEAMWEAR</b> - Tutti i diritti sono riservati</p>
          <a href="https://www.facebook.com/GGTeamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/fbicon.png" style="width:20px;"></a>
          <a href="https://www.instagram.com/gg_teamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/instaicon.png" style="width:20px;"></a>
        </div>
      </div>
    </body>
    </html>';

    $mail->Body = $message_admin;

    $mail->AddAttachment("image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["merge_all_canvas_file"] . ".png");

    $mail->send();
  }

  function sendMailToUser($fromUser, $toUser)
  {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "mail.amministrazionedigitale.org";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = 'info@amministrazionedigitale.org';                // SMTP username
    $mail->Password = 'thwQyREc@~{U';                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to
    $mail->Port = 587;                                   

    $mail->setFrom($fromUser, 'GGTEAMWEAR');

    $mail->addAddress($toUser);

    $mail->isHTML(true);

    $mail->Subject = "Configurazione completata";

    if($_POST["selected_order_shirt_1"])
      $shirt_order_detail_1 = json_decode($_POST["selected_order_shirt_1"]);
    if($_POST["selected_order_pants_1"])
      $pants_order_detail_1 = json_decode($_POST["selected_order_pants_1"]);
    if($_POST["selected_order_socks_1"])
      $socks_order_detail_1 = json_decode($_POST["selected_order_socks_1"]);

    if($_POST["selected_order_shirt_2"])
      $shirt_order_detail_2 = json_decode($_POST["selected_order_shirt_2"]);
    if($_POST["selected_order_pants_2"])
      $pants_order_detail_2 = json_decode($_POST["selected_order_pants_2"]);
    if($_POST["selected_order_socks_2"])
      $socks_order_detail_2 = json_decode($_POST["selected_order_socks_2"]);

    if($_POST["selected_order_shirt_3"])
      $shirt_order_detail_3 = json_decode($_POST["selected_order_shirt_3"]);
    if($_POST["selected_order_pants_3"])
      $pants_order_detail_3 = json_decode($_POST["selected_order_pants_3"]);
    if($_POST["selected_order_socks_3"])
      $socks_order_detail_3 = json_decode($_POST["selected_order_socks_3"]);
  
    $message_user = '<!DOCTYPE html>
                    <html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, "sans-serif";-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
                    <head>
                    <link href="https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800" rel="stylesheet">
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="x-apple-disable-message-reformatting">
                    </head>
                    <body>
                      <div style="text-align: center;font-size: 24px; max-width: 600px; margin: 0 auto; background-color: #ffffff;">
                        <img style="max-width:200px; padding-bottom: 30px; padding-top:25px;" src="https://amministrazionedigitale.org/ggteamwear/media/2020/09/logo350px.png">
                        <h1 style="font-size: 25px;">Gentile ' . $_POST["first_last_name"] .'</h1>
                        <h1 style="font-size: 25px; padding-bottom:30px;">Grazie, la tua configurazione è stata presa in carico!</h1>
                        <p style="font-size: 18px;">Ti ricordiamo che la richiesta <b>non è impegnativa</b>. Verrai contattato dal nostro Ufficio Commerciale entro 24h</p>
                        <p style="font-size: 18px; padding-bottom:30px;">Di seguito i dettagli:</p>

                        <p><b>Sport : </b>' . $_POST["selected_order_sport"] . '</p>
                        <p><b>Gender : </b>' . $_POST["selected_order_gender"] . '</p>
                        <p><b>Brand : </b>' . $_POST["selected_order_brand"] . '</p>';

    if($_POST["selected_order_typology_1"])
    {
      $message_user .= '<p><b>Tipologia_1 Kit : </b>' . $_POST["selected_order_typology_1"] .'</p>';
      if($shirt_order_detail_1)
      {
        $message_user .= '<p><b>Nome Prodotto Maglia : </b>' . $shirt_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_1->sku . '</p>';
      }

      if($pants_order_detail_1)
      {
        $message_user .= '<p><b>Nome Prodotto Pantalone : </b>' . $pants_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_1->sku . '</p>';
      }

      if($socks_order_detail_1)
      {
        $message_user .= '<p><b>Nome Prodotto Calze : </b>' . $socks_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_1->sku . '</p>';
      }
    }

    if($_POST["selected_order_typology_2"])
    {
      $message_user .= '<p><b>Tipologia_2 Kit : </b>' . $_POST["selected_order_typology_2"] .'</p>';
      if($shirt_order_detail_2)
      {
        $message_user .= '<p><b>Nome Prodotto Maglia : </b>' . $shirt_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_2->sku . '</p>';
      }

      if($pants_order_detail_2)
      {
        $message_user .= '<p><b>Nome Prodotto Pantalone : </b>' . $pants_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_2->sku . '</p>';
      }

      if($socks_order_detail_2)
      {
        $message_user .= '<p><b>Nome Prodotto Calze : </b>' . $socks_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_2->sku . '</p>';
      }
    }

    if($_POST["selected_order_typology_3"])
    {
      $message_user .= '<p><b>Tipologia_3 Kit : </b>' . $_POST["selected_order_typology_3"] .'</p>';
      if($shirt_order_detail_3)
      {
        $message_user .= '<p><b>Nome Prodotto Maglia : </b>' . $shirt_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_3->sku . '</p>';
      }

      if($pants_order_detail_3)
      {
        $message_user .= '<p><b>Nome Prodotto Pantalone : </b>' . $pants_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_3->sku . '</p>';
      }

      if($socks_order_detail_3)
      {
        $message_user .= '<p><b>Nome Prodotto Calze : </b>' . $socks_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_3->sku . '</p>';
      }
    }

    $message_user .= '<a href="https://www.amministrazionedigitale.org/ggteamwear/configuratore/main.php" style="padding: 10px 20px; background: #019c4f; text-decoration: none; color: white; border-radius: 5px;">CONFIGURA IL TUO KIT</a>
                        <div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
                          <p style="font-size: 14px;">© 2020 <b>GGTEAMWEAR</b> - Tutti i diritti sono riservati</p>
                          <a href="https://www.facebook.com/GGTeamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/fbicon.png" style="width:20px;"></a>
                          <a href="https://www.instagram.com/gg_teamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/instaicon.png" style="width:20px;"></a>
                        </div>
                      </div>
                    </body>
                    </html>';
    $mail->Body = $message_user;

    $mail->AddAttachment("image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["merge_all_canvas_file"] . ".png");

    // echo $message_user;
    $mail->send();
  }

  function saveOrderToCsvFile()
  {

    if($_POST["selected_order_shirt_1"])
      $shirt_order_detail_1 = json_decode($_POST["selected_order_shirt_1"]);
    if($_POST["selected_order_pants_1"])
      $pants_order_detail_1 = json_decode($_POST["selected_order_pants_1"]);
    if($_POST["selected_order_socks_1"])
      $socks_order_detail_1 = json_decode($_POST["selected_order_socks_1"]);

    if($_POST["selected_order_shirt_2"])
      $shirt_order_detail_2 = json_decode($_POST["selected_order_shirt_2"]);
    if($_POST["selected_order_pants_2"])
      $pants_order_detail_2 = json_decode($_POST["selected_order_pants_2"]);
    if($_POST["selected_order_socks_2"])
      $socks_order_detail_2 = json_decode($_POST["selected_order_socks_2"]);

    if($_POST["selected_order_shirt_3"])
      $shirt_order_detail_3 = json_decode($_POST["selected_order_shirt_3"]);
    if($_POST["selected_order_pants_3"])
      $pants_order_detail_3 = json_decode($_POST["selected_order_pants_3"]);
    if($_POST["selected_order_socks_3"])
      $socks_order_detail_3 = json_decode($_POST["selected_order_socks_3"]);

    $file = fopen('order-kit/configuratore-orders.csv', 'r');
    $order_last_rows = null;
    while (($line = fgetcsv($file)) !== FALSE) {
       $order_last_rows = $line;
    }
    fclose($file);

    $file = fopen('order-kit/configuratore-orders.csv', 'a');
    // fputcsv($file, array("ID", "USER NAME", "COMPANY NAME", "VAT NUMBER", "ADDRESS", "COUNTRY", "TELEPHONE", "EMAIL", "SPORT", "GENDER", "TYPOLOGY", "BRAND", "PRODUCT NAME", "PRODUCT SKU"), ";");

    if($shirt_order_detail_1)
    {
      $shirt_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_1"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $shirt_order_detail_1->name,
        'product_sku' => $shirt_order_detail_1->sku,
      );
      fputcsv($file, $shirt_arr, ";");
    }

    if($pants_order_detail_1)
    {
      $pants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_1"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $pants_order_detail_1->name,
        'product_sku' => $pants_order_detail_1->sku,
      );
      fputcsv($file, $pants_arr, ";");
    }

    if($socks_order_detail_1)
    {
      $socks_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_1"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $socks_order_detail_1->name,
        'product_sku' => $socks_order_detail_1->sku,
      );
      fputcsv($file, $socks_arr, ";");
    }

    if($shirt_order_detail_2)
    {
      $shirt_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_2"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $shirt_order_detail_2->name,
        'product_sku' => $shirt_order_detail_2->sku,
      );
      fputcsv($file, $shirt_arr, ";");
    }

    if($pants_order_detail_2)
    {
      $pants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_2"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $pants_order_detail_2->name,
        'product_sku' => $pants_order_detail_2->sku,
      );
      fputcsv($file, $pants_arr, ";");
    }

    if($socks_order_detail_2)
    {
      $socks_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_2"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $socks_order_detail_2->name,
        'product_sku' => $socks_order_detail_2->sku,
      );
      fputcsv($file, $socks_arr, ";");
    }

    if($shirt_order_detail_3)
    {
      $shirt_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_3"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $shirt_order_detail_3->name,
        'product_sku' => $shirt_order_detail_3->sku,
      );
      fputcsv($file, $shirt_arr, ";");
    }

    if($pants_order_detail_3)
    {
      $pants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_3"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $pants_order_detail_3->name,
        'product_sku' => $pants_order_detail_3->sku,
      );
      fputcsv($file, $pants_arr, ";");
    }

    if($socks_order_detail_3)
    {
      $socks_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'user_name' => $_POST["first_last_name"],
        'company_name' => $_POST["company_name"],
        'vat_number' => $_POST["vat_number"],
        'address' => $_POST["address"],
        'country' => $_POST["country"],
        'telephone' => $_POST["telephone"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => $_POST["selected_order_typology_3"],
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $socks_order_detail_3->name,
        'product_sku' => $socks_order_detail_3->sku,
      );
      fputcsv($file, $socks_arr, ";");
    }
    fclose($file);
  }
?>

<!-- END SEND MAIL SCRIPT -->   
<div id="success">      
      <main>
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="box_general">
                <div class="row justify-content-center">
                  <div class="icon icon--order-success svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                      <g fill="none" stroke="#8EC343" stroke-width="2">
                      <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                      <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                      </g>
                    </svg>
                  </div>
                </div>  
                            <h1 class="text-center mb-3 mt-3"><b>Grazie!</b></h1>
                            <h2 class="text-center">La tua configurazione è stata inviata</h2>
                <p class="text-center mt-3 mb-4">Verrai contattato dal nostro Ufficio Commerciale entro 24h</p><br>
                <h2 class="text-center">Vuoi configurare un altro Kit?</h2>

                <div class="row justify-content-center mt-4">
                    <!-- <button class="continue_wizard" id="continue_wizard"><i class="icon-brush mr-3"></i>CONFIGURA IL TUO KIT</button> -->
                    <a href="main.php" style="padding: 10px 20px; background: #019c4f; text-decoration: none; color: white; border-radius: 5px;">CONFIGURA IL TUO KIT</a>
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