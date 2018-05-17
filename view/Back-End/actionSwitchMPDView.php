<?php $title = 'redirect'; ?>

<?php ob_start(); ?>
<h2>Le changement de mot de passe a été effectué</h2>

<?php $content = ob_get_clean(); ?>

<?php require('asideView.php'); ?>