<!DOCTYPE html>
<head>
	<!--- Basic Page Needs================================================== -->
	<meta charset="utf-8">
	<title>
        <?php
        echo($title);
        ?>
    </title>
	<meta name="description" content="Billet simple pour l'Alaska">
	<meta name="robots" content="noindex, nofollow">
	<!-- Mobile Specific Metas================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Bootstrap +jquery+ tether +reset================================================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	<script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<!-- tiny mce============================================= -->
	<?php if (isset($tiny)&&$tiny){
			ob_start(); ?>
			  <script type="text/javascript" src='public/js/tinymce/tinymce.min.js'></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#myTextarea',
    theme: 'modern',
    width: 1200,
    height: 800,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
  </script>
  <?php $tinyScript = ob_get_clean();
  	echo($tinyScript); ?>

  	<?php	};
	  
	  ?>
	<!-- CSS================================================== -->
	<link rel="stylesheet" href="public/css/design.css">
	<!-- Favicons================================================== -->
	<link rel="shortcut icon" href="favicon.png" >
</head>
