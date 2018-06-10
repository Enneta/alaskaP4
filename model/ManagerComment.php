<?php
require_once('./model/ManagerPost.php');
class ManagerComment extends ManagerPost
{ 
    public $table = "b_comment";
    public $attributes = ['id', 'pseudo', 'content','idPost','signaler'];
    public $attributesTypes = [PDO::PARAM_INT,PDO::PARAM_STR,PDO::PARAM_STR,PDO::PARAM_INT,PDO::PARAM_INT];

    public $id;
    public $pseudo;
    public $content;
    public $idPost;
    public $signaler;

    
    final public function getAllWithPost($idPost){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT ' . implode(',', $this->attributes) .' FROM ' . $this->table .' Where idPost = :idPost'  );
        $req->bindParam('idPost', $idPost, PDO::PARAM_INT);
        $req->execute();
        $donnes = $req->fetchAll();
        return $donnes;
        
    }

    final public function report($id,$signalement){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE `' . $this->table .'` SET `signaler`= :signalement WHERE id = :id'  );
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->bindParam('signalement', $signalement, PDO::PARAM_INT);
        $req->execute();
    }

    final public function unReport($id){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE `' . $this->table .'` SET `signaler`= 0 WHERE id = :id'  );
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    final public function getAllReport($signalement){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM `' . $this->table .'` WHERE `signaler`>= :signalement'  );
        $req->bindParam('signalement', $signalement, PDO::PARAM_INT);
        $req->execute();
        $donnes = $req->fetchAll();
        return $donnes;
    }

}
?>
