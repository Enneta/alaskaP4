<?php $title = 'login'; ?>

<?php ob_start(); ?>

<form id="formulaire" action="./?action=actionLogin" method="post" >
    <h2>connexion</h2>
	<p>pseudo</p>
    <input type="text" class="formu" name="pseudo" placeholder="pseudo"/>
    <p>mot de passe</p>
    <input type="password" class="formu" name="mpd" placeholder="mot de passe"/>
    </br>
	<input type="submit" id="bouton" name="Envoyer" value="connexion"/>
</form>


<?php $content = ob_get_clean(); ?>
<?php ob_start(); ?>

<?php $aside = ob_get_clean(); ?>
<?php require('template.php'); ?>