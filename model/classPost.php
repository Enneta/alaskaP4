<?php
require_once('model/Model.php');
class Post extends Model
{   
    public $table = "b_post";
    public $attributes = ['id', 'title', 'content','parution'];
    public $attributesTypes = [PDO::PARAM_INT,PDO::PARAM_STR,PDO::PARAM_STR,PDO::PARAM_STR];
    


    public function getAllPostOrderParution(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT ' . implode(',', $this->attributes) .' FROM ' . $this->table .' ORDER BY `parution`' );
        $req->execute();
        $donnes = $req->fetchAll();
        return $donnes;
    
    }
}
?>