<?php $title = 'erreur'; ?>

<?php ob_start(); ?>
<h2>erreur de connexion</h2>
<?php
echo('<p>'.$msgError.'</p>');?>
<form id="formulaire" action="./?action=actionLogin" method="post" >
    <h2>connexion</h2>
	<p>pseudo</p>
    <input type="text" class="formu" name="pseudo" placeholder="pseudo"/>
    <p>mot de passe</p>
    <input type="text" class="formu" name="mpd" placeholder="mot de passe"/>
    </br>
	<input type="submit" id="bouton" name="Envoyer" value="connexion"/>
</form>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>