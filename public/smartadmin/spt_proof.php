<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
    	<form method="post" action="" enctype="multipart/form-data" >
    		<h1>Seleccionar Archivo</h1>
    		<input type="file" name="fleFlac">
    		<input type="submit" value="Subir Archivo" name="sbmtBoton">
    	</form>
    	<?php 
    	ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
    	$formatos = array('.flac', '.jpg');
    	if (isset($_POST['sbmtBoton'])) {
    		$nombreArchivo = $_FILES['fleFlac']['name'];
    		$nombreTempArchivo = $_FILES['fleFlac']['tmp_name'];
    		$ext = substr($nombreArchivo, strpos($nombreArchivo, '.'));
    		if (in_array($ext, $formatos)) {
    			$destination_path = getcwd().DIRECTORY_SEPARATOR.'audio_files'.DIRECTORY_SEPARATOR;
				$target_path = $destination_path . basename( $_FILES["fleFlac"]["name"]);
    			if (move_uploaded_file($nombreTempArchivo, $target_path)) {
    				echo "Archivo subido correctamente";
    			}else{
    				echo "Ocurrio un error, vuelvalo a intentar";
    			}
    		}else{
    			echo "La extension del archivo no es permitida";
    		}
    	}

    	?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

    </body>
</html>
