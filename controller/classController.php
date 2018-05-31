<?php
require_once('./model/ClassUser.php');
require_once('./model/ClassPost.php');
require_once('./model/ClassComment.php');
class controller{
    public $signalement = 1;
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
        $log = $log [0];
        $isPasswordCorrect = password_verify($_POST['actualMPD'], $log[2]);
        if($isPasswordCorrect){
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
        $data[2] = htmlspecialchars($_POST['content']);
        $date = htmlspecialchars($_POST['date']);
        $data[3] = date($date);
        $post = new Post;
        $data2[0] =$data[1];
        $data2[1] =$data[2];
        $control = $this->controlPost($data2);
        if ($control){
            $post->id=$data[0];
            $post->title=$data[1];
            $post->content=$data[2];
            $post->parution=$data[3];
            $post->save();
        $message = htmlspecialchars('Votre chapitre a bien été modifié');
        }
        else{
            $message = htmlspecialchars("une erreur s'est produite, pensez a remplir vos champs texte ou a ne pas dépasser les tailles limites");
        }
        require('view/Back-End/postTraitement.php');
    }

  
    public function deletePost(){
        $id = (int)htmlspecialchars($_POST['id']);
        $post = new Post;
        $post->init($id);
        $post->suprimer();
        $message = htmlspecialchars('Votre chapitre a bien été suprimé');
        require('view/Back-End/postTraitement.php');
    }
    
    
    public function updatePostAside(){
        $post = new Post();
        $log = $post->getAllPostOrderParution();
        $lien = '';

        $lienAdmin = '';
        $count = 0;
        $today = strtotime("now");
        
        foreach ($log as $key => $log){
            $parution = strtotime($log['parution']);
            
            if($parution and $parution < $today ){
                $count ++;
                $lien = $lien.'<option value="'.$log['id'].'">chapitre '.$count.' '.$log['title'].'</option>';
            }else{
                $lienAdmin = $lienAdmin.'<option value="'.$log['id'].'">chapitre  '.$log['title'].'</option>';
            }
        }
        
        $lien = $lien . $lienAdmin;
        
        
        return $lien;
    }

    public function readNav(){
        $post = new Post();
        $req = $post->getAllPostOrderParution();
        $data = array();
        $pre= '';
        $lienFirst= '';
        $lienPre = '';
        $lien = '';
        $lienNext ='';
        $count = 0;
        $today = strtotime("now");
        $first = true;
        $old = false;
        $next = false;
        if(isset($_POST['chapId'])){
            $id = (int)$_POST['chapId'];
            $old = true;
            $next = true;
        }
        foreach ($req as $key => $log){
            $ikey = $key+1;
            $parution = strtotime($log['parution']);
            if(isset($req[$ikey])){
            $parutionNext = strtotime($req[$ikey]['parution']);
            }
            if($parution and $parution <= $today ){

                if(!$first and $old and $id == $log['id']){
                    $lienPre = $pre;
                    $old = false;
                    }

                if($first){
                    $lienFirst= $log['id'];
                    $first = false;
                    $lienPre = $lienFirst;
                }

                $count ++;
                $lien = $lien.'<option value="'.$log['id'].'">chapitre '.$count.' '.$log['title'].'</option>';
                $pre = $log['id'];

                if($next){
                    $lienNext = $log['id'];
                }

                
            }
            if(isset($req[$ikey])){
            if($parutionNext and $parutionNext < $today and $next and $id == $log['id']){
                $lienNext = $req[$ikey]['id'];
                $next = false;
                
            }
            }
        }
        $data[0]= $lienFirst;
        $data[1]= $lienPre;
        $data[2]= $lien;
        $data[3]= $lienNext;
        $data[4]= $pre;
        return $data;
    }

    public function lecture(){
        if(isset($_POST['chapId'])){
            $post = new Post;
            $comment = new Comment;
            $id = (int)$_POST['chapId'];
            $data = $post->find($id);
            $comments = $comment->getAllWithPost($id);
            
            require('view/Front-End/lectureView.php');
        }else{
            require('view/Front-End/indexView.php');
        }
    }

    public function controlPost($data){
        $test = true;
        if ($data[0] == '' or strlen($data[0])>250){
            $test = false;
        }

        if ($data[1] == '' or strlen($data[1])>50000){
            $test = false;
        }

        return ($test);
    }

    public function createPost(){
        
        $data[0] = htmlspecialchars($_POST['titre']);
        $data[1] = htmlspecialchars($_POST['content']);
        $date = htmlspecialchars($_POST['date']);
        $data[2] = date($date);
        
        $control = $this->controlPost($data);
        if ($control){
            $post = new Post;
            $post->title=$data[0];
            $post->content=$data[1];
            $post->parution=$data[2];
            $post->save();
            $message = htmlspecialchars('Votre chapitre a bien été ajouté');
        }
        else{
            $message = htmlspecialchars("une erreur s'est produite, pensez a remplir vos champs texte ou a ne pas dépasser les tailles limites");
        }
        require('view/Back-End/postTraitement.php');
    }

    public function createComment(){
        if(isset($_POST['comment'])){
        $data[0] = htmlspecialchars($_POST['pseudo']);
        $data[1] = htmlspecialchars($_POST['content']);
        $data[2] = (int)htmlspecialchars($_POST['chap']);
        $data[3] = 0;
        $comment = new Comment;
        $comment->pseudo = $data[0];
        $comment->content = $data[1];
        $comment->idPost = $data[2];
        $comment->save();
        $message = htmlspecialchars('Votre commentaire a bien été ajouté');
        require('view/Front-End/commentTraitement.php');}
        else{
            require('view/Front-End/indexView.php');
        }
    }

    public function report(){
        if(isset($_POST['report'])){
            $comment = new Comment;
            $id = (int)$_POST['idcomment'];
            $report = (int)$_POST['signalement'];
            $report++;
            $comment->report($id,$report);
            $message = htmlspecialchars('Votre commentaire a bien été reporté');
            require('view/Front-End/commentTraitement.php');
        }
        else{
            require('view/Front-End/indexView.php');
        }
    }

    public function commentMod(){
        $signalement = $this->signalement;
        $comment = new Comment;
        $comments = $comment->getAllReport($signalement);
        require('view/Back-End/commentForm.php');
    }

    public function judge(){
        $comment = new Comment;
        
        if(isset($_POST['judge'])){
            $id = (int)$_POST['idcomment'];
            if($_POST['judge'] == 'suprimer'){
                $comment->init($id);
                $comment->suprimer();
                $message = 'commentaire suprimer';
                require('view/Back-End/commentTraitement.php');
            }
            elseif($_POST['judge'] == 'reset signalement'){
                $comment->unReport($id);
                $message = 'signalement remis a zero';
                require('view/Back-End/commentTraitement.php');
            }
            else{
                require('view/Front-End/indexView.php');
            }
        }

        
    }

}

