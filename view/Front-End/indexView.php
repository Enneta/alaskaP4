
<?php $title = 'accueil'; ?>

<?php ob_start(); ?>
<h2>Bienvenue</h2>
<p>Bonjour à vous cher lecteur,</p>

<p>Ce site vous accueil afin de vous permettre de suivre mon histoire.</p>

<p>Un billet simple pour l'Alaska, une histoire des plus captivantes !</p>

<p>retrouvez le décor du désert enneiger de l'Alaka dans cette aventure.</p>

<p>Les chapitres manquants paraîtront sur le site à leurs sorties.</p>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>