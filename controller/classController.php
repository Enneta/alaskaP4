<?php
require_once('model/ClassUser.php');
require_once('model/ClassPost.php');
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
                $log = $log [0];
                
                if (isset($_POST['pseudo']) AND isset($_POST['mpd'])){
                    // Comparaison du pass envoyé via le formulaire avec la base
                    $isPasswordCorrect = password_verify($_POST['mpd'], $log[2]);
                    if($_POST['pseudo'] === $log[1] AND $isPasswordCorrect){
                        $_SESSION['admin'] = true;
                        require('view/Back-End/adminAccueilView.php');
                    }else{
                        $msgError = var_dump($log);
                        require('view/Back-End/errorLogView.php');
                    }
                }else{
                    $msgError = "Attention aucun identifiant n'a été saisie";
                    require('view/Back-End/errorLogView.php');
                }
            
        
    }

    public function deconnexion(){
        session_destroy ();
        require('view/Front-End/indexView.php');
        
    }

    public function nextChap(){
        $post = new Post();
        $log = $post->count();
        $log = $log[0];
        $log++;
        $tiny = true;
        $_POST['chapitre'] = $log;
        require('view/Back-End/nextChapView.php');
    }

    public function updatePostForm(){
        $post = new Post();
        $id = (int)htmlspecialchars($_POST['menu_destination']);
        $all = $post->find($id);
        $log = $all['parution'];
        $tiny = true;
        require('view/Back-End/updatePostView.php');
    }

    public function updatePost(){
        $data[0] = (int)htmlspecialchars($_POST['id']);
        $data[1] = htmlspecialchars($_POST['titre']);
        $data[2] = (int)htmlspecialchars($_POST['chapitre']);
        $data[3] = htmlspecialchars($_POST['content']);
        $date = htmlspecialchars($_POST['date']);
        $data[4] = date($date);
        $data[5] = "''";
        $post = new Post;
        $post->update($data);
        $message = htmlspecialchars('Votre chapitre a bien été modifié');
        require('view/Back-End/postTraitement.php');
    }

  
    public function deletePost(){
        $id = (int)htmlspecialchars($_POST['id']);
        $post = new Post;
        $post->delete($id);
        $message = htmlspecialchars('Votre chapitre a bien été suprimé');
        require('view/Back-End/postTraitement.php');
    }
    

    public function updatePostAside(){
        $post = new Post();
        $log = $post->getAllPostOrderParution();
        $lien = '';
        $count = 0;
        foreach ($log as $key => $log){
            $count ++;
            $lien = $lien.'<option value="'.$log['id'].'">chapitre '.$count.'</option>';
        }
        return $lien;
    }

    public function createPost(){
        
        $data[0] = htmlspecialchars($_POST['titre']);
        $data[1] = (int)htmlspecialchars($_POST['chapitre']);
        $data[2] = htmlspecialchars($_POST['content']);
        $date = htmlspecialchars($_POST['date']);
        $data[3] = date($date);
        $data[4] = "''";
        $post = new Post;
        $post->create($data);
        $message = htmlspecialchars('Votre chapitre a bien été ajouté');
        require('view/Back-End/postTraitement.php');
    }

}

