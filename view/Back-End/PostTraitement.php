<?php $title = 'action effectué'; ?>

<?php ob_start(); ?>
<?php echo($message); ?>
<?php $content = ob_get_clean(); ?>
<?php require('asideView.php'); ?>
