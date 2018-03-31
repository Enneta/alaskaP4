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
        $_POST['actualMPD'] = htmlspecialchars($_POST['actualMPD']);
        $_POST['mpd'] = htmlspecialchars($_POST['mpd']);
        $_POST['mpdConfirm'] = htmlspecialchars($_POST['mpdConfirm']);
        $user = new user();
        $log = $user->getAll();
        if($log[1] === $_POST['actualMPD']){
            $user->switchPass($_POST['mpd']);
            require('view/Back-End/actionSwitchMPDView.php');
        }else if($_POST['mpd'] !== $_POST['mpdConfirm'] AND $_POST['mpd'] !== ''){
            $msgError = "les nouveaux mots de passes saisies ne correspondent pas ou sont non valides";
            require('view/Back-End/errorSwitchMPDView.php');
        }else{
            $msgError = "L'ancien mot de passe n'est pas le  bon";
            require('view/Back-End/errorSwitchMPDView.php');
        }
    }
    public function switchMpd(){
        
        require('view/Back-End/passFormView.php');
    }
    public function login(){
        if(isset($_SESSION['admin']) and $_SESSION['admin']){

                require('view/Back-End/adminAccueilView.php');
            }else{
                require('view/Back-End/loginView.php');
        }
    }


    public function connexion(){

                $_POST['pseudo']= htmlspecialchars($_POST['pseudo']);
                $_POST['mpd']= htmlspecialchars($_POST['mpd']);
                $user = new user();
                $log = $user->getAll();
        

                if (isset($_POST['pseudo']) AND isset($_POST['mpd'])){
                    // Comparaison du pass envoyé via le formulaire avec la base
                    $isPasswordCorrect = password_verify($_POST['mpd'], $log[1]);
                    if($_POST['pseudo'] === $log[0] AND $isPasswordCorrect){
                        $_SESSION['admin'] = true;
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

