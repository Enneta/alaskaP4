<?php $title = 'redirect'; ?>

<?php ob_start(); ?>
<h2>Le changement de mot de passe a été effectué</h2>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['admin'])){
    if($_SESSION['admin']){
        ?><a href='./?action=switchMpd'><button type="button" class="btn btn-secondary">changer votre mot de passe</button></a><?php
    }
};?>
<?php $aside = ob_get_clean(); ?>

<?php require('view/Back-End/template.php'); ?>