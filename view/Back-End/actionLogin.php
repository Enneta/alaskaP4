<?php $title = 'redirect'; ?>

<?php ob_start(); ?>
<h2>connecté</h2>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>