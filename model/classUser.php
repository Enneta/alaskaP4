<?php
class user
{   
    
    public function getAll()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT pseudo, pass FROM b_user;');
        $req->execute(array(0));
        $donnes = $req->fetch();
        return $donnes;
    }

    public function switchPass($pass)
    {   
        $pass= password_hash($pass, PASSWORD_DEFAULT);
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE b_user SET pass = :pass WHERE id = 1');
        $req->execute(array(
	    'pass' => $pass
	    ));
        
    }


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=alaskaforteroche;charset=utf8', 'root', '');
        return $db;
    }
}
?>