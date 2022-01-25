<?php
	$myfile = fopen("image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["date_time"] . ".png", "w") or die("Unable to open file!");
	fwrite($myfile, base64_decode(explode(',', $_POST["image"])[1]));
	fclose($myfile);
?>