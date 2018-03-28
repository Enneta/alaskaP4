<?php
require_once('model/classUser.php');
class controller{
    //Front-END
    //Page d'acceuil
    public function index(){
        
        require('view/Front-End/indexView.php');
    }
    public function mentionLegale(){
        require('view/Front-End/mentionLegalView.php');
    }
    //Back-END
    public function adminAccueil(){
        
        require('view/Back-End/adminAccueilView.php');
    }

    public function actionSwitchMPD(){
        require('view/Back-End/actionswitchMpd.php');
    }
    public function switchMpd(){
        
        require('view/Back-End/passFormView.php');
    }
    public function login(){
        
        require('view/Back-End/loginView.php');
    }


    public function connexion(){
        
        $user = new user();
        $log = $user->getAll();
        echo($log[0]);
        echo($log[1]);
        echo($_POST['pseudo']);
        echo($_POST['mpd']);
        if (isset($_POST['pseudo']) AND isset($_POST['mpd'])){
            if($_POST['pseudo'] === $log[0] AND $_POST['mpd'] === $log[1]){
            require('view/Back-End/adminAccueilView.php');
            }else{
                $msgError = "Identifiant saisie incorect";
                require('view/Back-End/errorLogView.php');
            }
        }else{
            $msgError = "Attention aucun identifiant n'a été saisie";
            require('view/Back-End/errorLogView.php');
        }
    }

}

