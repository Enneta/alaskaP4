<?php $title = 'Ecriture du prochain chapitre'; ?>

<?php ob_start(); ?>
<h2>Ecriture du prochain chapitre</h2>
chapitre numéro <?php echo($log);?>
<form class ='tinyForm'action="./?action=createPost" method="post">
<input name="chapitre" type="hidden" value=" <?php echo($log); ?> "/>
<input name="titre" type="text" value=""/>
<textarea name="content" id="myTextarea"></textarea>
<input name="date" type="date" value=""/>
<input name="post" type="submit" value="nextchap" /></form>
<?php $content = ob_get_clean(); ?>
<?php require('asideView.php'); ?>