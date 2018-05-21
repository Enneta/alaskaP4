<?php
$dataNAv = $this->readNav();
ob_start(); ?>
<nav class="navbar navbar-dark bg-dark sticky-top navbar-expand-lg ">



  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
  <form class="form-inline my-2 my-lg-0"  method="post" action="./?action=lecture"> 
    <button class="btn-primary nav-item nav-link" type="submit" >début</button>
    <input  name="chapId" type="hidden" value="<?php echo($dataNAv[0]); ?>">
  </form>
  
    <?php if(isset($_POST['chapId'])){ ?>
    <form class="form-inline my-2 my-lg-0"  method="post" action="./?action=lecture"> 
    <input  name="chapId" type="hidden" value="<?php echo($dataNAv[1]); ?>">
    <button class="btn-primary nav-item nav-link" type="submit">précédent</button>'
      
    
    </form>
    <?php }?>
    <form class="form-inline my-2 my-lg-0"  method="post" action="./?action=lecture">
      <select name="chapId">

          <?php echo($dataNAv[2]); ?>

        </select>
        <button class="btn-primary nav-item nav-link" type="submit">Lire</button>
    </form>

    <form class="form-inline my-2 my-lg-0"  method="post" action="./?action=lecture">
        <?php if(isset($_POST['chapId'])){ ?>
    <button class="btn-primary nav-item nav-link" type="submit" >suivant</button>
  
    <input  name="chapId" type="hidden" value="<?php echo($dataNAv[3]); ?>">
    </form>
    <?php }?>
    <form class="form-inline my-2 my-lg-0"  method="post" action="./?action=lecture">
    <button class="btn-primary nav-item nav-link" type="submit">dernier</button>
    
    <input  name="chapId" type="hidden" value="<?php echo($dataNAv[4]); ?>">
    </form>
        </div>
</nav>
<?php $nav = ob_get_clean(); ?>
<?php require('template.php'); ?>