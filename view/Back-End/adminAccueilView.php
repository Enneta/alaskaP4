<?php $title = 'accueil admin'; ?>

<?php ob_start(); ?>
<h2>Bienvenue Jean Forteroche</h2>
<p>Vous pouvez à partir de cette page administrer vos chapitres</p>
<p>Ou alors modérer les commentaires.</p>
<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['admin'])){
    if($_SESSION['admin']){
        ?><a href='./?action=switchMpd'><button type="button" class="btn btn-secondary">changer votre mot de passe</button></a><?php
    }
};?>
<?php $aside = ob_get_clean(); ?>
<?php require('template.php'); ?>