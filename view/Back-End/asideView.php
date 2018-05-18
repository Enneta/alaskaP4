<?php
$lien = $this->updatePostAside();
ob_start(); ?>
<?php if (isset($_SESSION['admin'])){
    if($_SESSION['admin']){
        ?>
        <ul><li>
        modifier un chapitre
        </li>
        <li>        
        <form method="post" action="./?action=updatePostForm">

        <p>

        <select name="menu_destination">

          <?php echo($lien); ?>

        </select>

        <input type="submit" value="Go" title="valider pour aller à la page sélectionnée" />

        </p>

        </form>
        </li><li>
        <a href='./?action=nextChap'><button type="button" class="btn btn-secondary">Ecrire le prochain chapitre</button></a>
        </li><li>
        <a href='./?action=commentMod'><button type="button" class="btn btn-secondary">voir les commentaires signaler</button></a>
        </li><li>
        <a href='./?action=switchMpd'><button type="button" class="btn btn-secondary">changer votre mot de passe</button></a>
        </li><li>
        <a href='./?action=deco'><button type="button" class="btn btn-secondary">Déconnexion</button></a>
        </li></ul>
        <?php
    }
};?>
<?php $aside = ob_get_clean(); ?>
<?php require('template.php'); ?>