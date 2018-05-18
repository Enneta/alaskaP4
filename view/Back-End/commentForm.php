<?php $title = 'Modération des commentaire'; ?>

<?php ob_start(); ?>
<?php foreach ($comments as $key => $comment){ ?>
<p>pseudo :<?php echo($comment['pseudo']); ?></p>

<p>message:<?php echo($comment['content']); ?></p>

<form method="post" action="./?action=judge">
<input name="idcomment" type="hidden" value="<?php echo($comment['id']); ?>"/>
<input class='col-2' name="judge" type="submit" value="suprimer" />
<input class='col-2' name="judge" type="submit" value="reset signalement" />
</form>
<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require('asideView.php'); ?>
