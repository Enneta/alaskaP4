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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<!-- tiny mce============================================= -->
	<?php if (isset($tiny)&&$tiny){
			ob_start(); ?>
			  <script type="text/javascript" src='public/js/tinymce/tinymce.min.js'></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#myTextarea',
    theme: 'modern',
    width: 'auto',
    height: 400,
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
	<link rel="stylesheet" href="./public/css/design.css">
	<!-- Favicons================================================== -->
	<link rel="shortcut icon" href="favicon.png" >
</head>
