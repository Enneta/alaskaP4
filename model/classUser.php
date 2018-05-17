<?php
require_once('model/Model.php');
class user extends Model
{   
    public $table = "b_user";
    public $attributes = ['id', 'pseudo', 'pass'];

    public function switchPass($pass)
    {   
        $pass= password_hash($pass, PASSWORD_DEFAULT);
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE b_user SET pass = :pass WHERE id = 1');
        $req->execute(array(
        'pass' => $pass
	    ));
        
    }


}
?>