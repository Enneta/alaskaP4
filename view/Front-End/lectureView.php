<?php $title = 'Espace lecture'; ?>

<?php ob_start(); ?>
<h2>Bonne lecture</h2>
<h1><?php echo($data['title']); ?></h1>
<?php echo(htmlspecialchars_decode($data['content'])); ?>
<div class='col-12'>
<h2>espace commentaire</h2>
<form method="post" action="./?action=createComment">
<input class='col-6' name="pseudo" type="text" value="pseudo"/>
<textarea class='col-6' name="content" id="myTextarea">Commentaire...</textarea>
<input name="chap" type="hidden" value="<?php echo($data['id']); ?>"/>
<input class='col-6' name="comment" type="submit" value="Envoyer" />
</form>

<?php foreach ($comments as $key => $comment){ ?>
<p>pseudo :<?php echo($comment['pseudo']); ?></p>
<form method="post" action="./?action=report">
<input name="idcomment" type="hidden" value="<?php echo($comment['id']); ?>"/>
<input name="signalement" type="hidden" value="<?php echo($comment['signaler']); ?>"/>
<input class='col-6' name="report" type="submit" value="Envoyer" />
</form>
<p>message:<?php echo($comment['content']); ?></p>
<?php } ?>
</div>


<?php $content = ob_get_clean(); ?>



<?php require('ReadNavView.php'); ?>