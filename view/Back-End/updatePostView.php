<?php $title = 'Ecriture du prochain chapitre'; ?>

<?php ob_start(); ?>
<h2>modification du chapitre</h2>
chapitre numéro <?php echo($log);?>
<form class ='tinyForm'action="./?action=updatePost" method="post">
<input name="id" type="hidden" value=" <?php echo($all["id"]); ?> "/>
<input name="chapitre" type="hidden" value=" <?php echo($all["chapitre"]); ?> "/>
<input name="titre" type="text" value="<?php echo($all["title"]); ?>"/>
<textarea name="content" id="myTextarea"><?php echo($all["content"]); ?></textarea>
<input name="date" type="date" value="<?php echo($all["parution"]); ?>"/>
<input name="submitPost" type="submit" value="Modifier" />
<input name="submitPost" type="submit" value="Suprimer" /></form>
<?php $content = ob_get_clean(); ?>
<?php require('asideView.php'); ?>