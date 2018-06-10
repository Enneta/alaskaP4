<?php
require_once('./model/ManagerModel.php');
class ManagerUser extends ManagerModel
{   
    public $table = "b_user";
    public $attributes = ['id', 'pseudo', 'pass'];
    public $attributesTypes = [PDO::PARAM_INT,PDO::PARAM_STR,PDO::PARAM_STR];
    public $id;
    public $pseudo;
    public $pass;

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
