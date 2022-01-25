<?php
  require_once "layout/header.php";
?>
<?php
  require "phpmailer/src/PHPMailer.php";
  require "phpmailer/src/Exception.php";
  require "phpmailer/src/SMTP.php";

  setUserInformationToCookie();
  sendMailToAdmin("info@amministrazionedigitale.org", "consulenze.basile@gmail.com");
  sendMailToUser("info@amministrazionedigitale.org", $_POST["email"]);

  function setUserInformationToCookie()
  {
    $user = [
      "name" => $_POST["first_last_name"],
      "company" => $_POST["company_name"],
      "vat" => $_POST["vat_number"],
      "address" => $_POST["address"],
      "country" => $_POST["country"],
      "telephone" => $_POST["telephone"],
      "email" => $_POST["email"],
    ];
    setcookie("user", json_encode($user), time()+60*60*24*30);
  }

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

    $mail->Subject = "Nuovo Iscrizione Configuratore B2B";

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
        <h1 style="font-size: 25px;">Un utente ha appena iniziato a usare il configuratore</h1>
        <div style="text-align: center; font-size:16px;">
          <p>Di seguito i dettagli:</p>
          <p><b>Nome e Cognome : </b>' . $_POST["first_last_name"] . '</p>
          <p><b>Ragione Sociale : </b>' . $_POST["company_name"] . '</p>
          <p><b>Partita IVA : </b>' . $_POST["vat_number"] . '</p>
          <p><b>Indirizzo : </b>' . $_POST["address"] . '</p>
          <p><b>Regione : </b>' . $_POST["country"] . '</p>
          <p><b>Telefono : </b>' . $_POST["telephone"] . '</p>
          <p><b>Email : </b>' . $_POST["email"] . '</p>
        </div>  
        <div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
          <p style="font-size: 14px;">© 2020 <b>GGTEAMWEAR</b> - Tutti i diritti sono riservati</p>
          <a href="https://www.facebook.com/GGTeamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/fbicon.png" style="width:20px;"></a>
          <a href="https://www.instagram.com/gg_teamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/instaicon.png" style="width:20px;"></a>
        </div>
      </div>
    </body>
    </html>';
    $mail->Body = $message_admin;

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

    $mail->Subject = "Iscrizione completata";
    
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
                        <h1 style="font-size: 25px; padding-bottom:30px;">Grazie per esserti registrato!</h1>
                        <p style="font-size: 18px;"><b>Continua</b> la procedura guidata e scopri lo <b>sconto</b> a te dedicato</p>
                        <p style="font-size: 18px; padding-bottom:30px;">Per utilizzare il configuratore clicca sul bottone:</p>
                        <a href="https://www.amministrazionedigitale.org/ggteamwear/configuratore/main.php" style="padding: 10px 20px; background: #019c4f; text-decoration: none; color: white; border-radius: 5px;">CONFIGURA IL TUO KIT</a>
                        <div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
                          <p style="font-size: 14px;">© 2020 <b>GGTEAMWEAR</b> - Tutti i diritti sono riservati</p>
                          <a href="https://www.facebook.com/GGTeamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/fbicon.png" style="width:20px;"></a>
                          <a href="https://www.instagram.com/gg_teamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/instaicon.png" style="width:20px;"></a>
                        </div>
                      </div>
                    </body>
                    </html>';
    $mail->Body = $message_user;

    $mail->send();
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
                            <h2 class="text-center">La tua iscrizione è andata a buon fine</h2>
                <p class="text-center mt-3">Fai click sul pulsante in basso per utilizzare il Configuratore</p>
                  <div class="row justify-content-center">
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