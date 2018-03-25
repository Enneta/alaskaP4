<?php
class post
{   
    
    public function setPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query("INSERT INTO `b_post`( `title`, `content`, `date`, `image`) VALUES ('titre1','salut je test','20061223 23:59:59.99','images/image1');");
        return $req;
    }

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=alaskaforteroche;charset=utf8', 'root', '');
        return $db;
    }
}