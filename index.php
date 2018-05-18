<?php
session_start();
//init var
require_once('controller/classController.php');
$control = new controller();
if (isset($_GET['action'])) {
    //Front End
    if ($_GET['action'] == 'mentionLegale') {
        $control->mentionLegale();
        
    }
    else if ($_GET['action'] == 'lecture') {
        $control->lecture();
        
    }
    else if ($_GET['action'] == 'createComment') {
        $control->createComment();
        
    }
    else if ($_GET['action'] == 'report') {
        $control->report();
    }

    else if ($_GET['action'] == 'actionLogin') {
        $control->connexion();
        
    }

    else if ($_GET['action'] == 'login') {
        $control->login();
    }

    
    //BAck End
    // Seul la methode login et connexion sont accessible sans etre connecté en admnistrateur, pour des raisons évidentes...

    
    else if (isset($_SESSION['admin']) and $_SESSION['admin']) {
        if ($_GET['action'] == 'adminAccueil') {
            $control->adminAccueil();
        }

        if ($_GET['action'] == 'nextChap') {
            $control->nextChap();
        }
        
        if ($_GET['action'] == 'login') {
            $control->login();
        }
        if ($_GET['action'] == 'deco') {
            $control->deconnexion();
        }
        if ($_GET['action'] == 'switchMpd') {
            
            $control->switchMpd();
            
        }
        
        if ($_GET['action'] == 'actionSwitchPass') {
            
            $control->actionSwitchMPD();
            
        }

        if ($_GET['action'] == 'createPost') {
            
            $control->createPost();
            
        }

        if ($_GET['action'] == 'updatePostForm') {
            
            $control->updatePostForm();
            
        }

        if ($_GET['action'] == 'updatePost') {
            if ($_POST['submitPost'] == 'Modifier') {
                $control->updatePost();
            } 
            if ($_POST['submitPost'] == 'Suprimer') {
                $control->deletePost();
            }
            
            
        }
    }
    else {
        $control->login();
    }
    
    
}

else {
    
    $control->index();
    
    
}



?>