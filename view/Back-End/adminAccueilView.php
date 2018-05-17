<?php $title = 'accueil admin'; ?>

<?php ob_start(); ?>
<h2>Bienvenue Jean Forteroche</h2>
<p>Vous pouvez à partir de cette page administrer vos chapitres</p>
<p>Ou alors modérer les commentaires.</p>
<?php $content = ob_get_clean(); ?>
<?php require('asideView.php'); ?>
