<?php
$lien = $this->updatePostAside();
ob_start(); ?>
<?php if (isset($_SESSION['admin'])){
    if($_SESSION['admin']){
        ?>
        <ul class="ulAside"><li class="col-12">
        modifier un chapitre
        </li>
        <li class="col-12">        
        <form method="post" class='bg-secondary' action="./?action=updatePostForm">

        <p>

        <select name="menu_destination" class="col-12">

          <?php echo($lien); ?>

        </select>

        <input type="submit" value="Go" title="valider pour aller à la page sélectionnée" class="col-12 asideButton"/>

        </p>

        </form>
        </li><li>
        <a href='./?action=nextChap'><button type="button" class="btn btn-secondary col-12 asideButton">Ecrire le </br> prochain chapitre</button></a>
        </li><li>
        <a href='./?action=commentMod'><button type="button" class="btn btn-secondary col-12 asideButton">voir les commentaires </br> signalés</button></a>
        </li><li>
        <a href='./?action=switchMpd'><button type="button" class="btn btn-secondary col-12 asideButton">changer votre </br> mot de passe</button></a>
        </li><li>
        <a href='./?action=deco'><button type="button" class="btn btn-secondary col-12 asideButton">Déconnexion</button></a>
        </li></ul>
        <?php
    }
};?>
<?php $aside = ob_get_clean(); ?>
<?php require('template.php'); ?>