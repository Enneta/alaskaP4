<?php $title = 'erreur'; ?>

<?php ob_start(); ?>
<h2>erreur lors du changement de passe</h2>
<?php
echo('<p>'.$msgError.'</p>');?>
<form id="formulaire" action="./?action=actionSwitchPass" method="post" >
	<p>Ancien mot de passe</p>
    <input type="password" class="formu" name="actualMPD" placeholder="Ancien mot de passe"/>
    <p>Nouveau mot de passe</p>
    <input type="password" class="formu" name="mpd" placeholder="Nouveau mot de passe"/>
    <p>Confirmer nouveau mot de passe</p>
    <input type="password" class="formu" name="mpdConfirm" placeholder="Confirmation"/>
    </br>
	<input type="submit" id="bouton" name="Envoyer" value="changer"/>
</form>



<?php $content = ob_get_clean(); ?>

<?php require('asideView.php'); ?>