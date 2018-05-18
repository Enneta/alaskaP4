<?php

abstract class Model{

    protected $table = ""; // redefinir dans les classes qui heritent

    public $attributes = array(); // redefinir dans les classes qui heritent
    
    public $attributesTypes = array(); // redefinir dans les classes qui heritent

    protected function dbConnect(){
        $db = new PDO('mysql:host=localhost;dbname=alaskaforteroche;charset=utf8', 'root', '');
        return $db;
    }

    public function getAll(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT ' . implode(',', $this->attributes) .' FROM ' . $this->table );
        $req->execute(array(0));
        $donnes = $req->fetchAll();
        return $donnes;
    }

    public function find( $id ){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT ' . implode(',', $this->attributes) . ' FROM ' . $this->table . ' WHERE id = :id');
        $req->bindParam('id', $id, $this->attributesTypes[0]);
        $req->execute();
        $post = $req->fetch();
        return $post;
    }

    public function create($data){
        $i=0;
        $db = $this->dbConnect();
        $atribut = $this->attributes;
        $attributesTypes = $this->attributesTypes;
        array_splice($atribut, 0, 1);
        array_splice($attributesTypes, 0, 1);
        
        $req = $db->prepare('INSERT INTO '.$this->table.'('.implode(",", $atribut).') VALUES( :'.implode(" , :", $atribut).')');
        foreach ($atribut as $key => $atribut){
            $req->bindParam($atribut, $data[$key], $attributesTypes[$key]);
            
        }
        var_dump($req);
        $req->execute();
    }

    public function update($data){
        $i=0;
        $db = $this->dbConnect();
        $atribut = $this->attributes;
        $attributesTypes = $this->attributesTypes;
        $id = $data[0];
        array_splice($data, 0, 1);
        array_splice($atribut, 0, 1);

        $prepare = 'UPDATE `'.$this->table.'` SET';
        foreach ($atribut as $key => $atribut){
            $prepare= $prepare.' `'.$atribut.'` = :'.$atribut.','; 
        }
        $switchChar = strlen($prepare);
        $prepare[$switchChar-1] = ' ';
        $atribut = $this->attributes;
        $prepare = $prepare.' where '.$atribut[0].' = :'.$atribut[0];
        $req = $db->prepare($prepare);
        $req->bindParam($atribut[0], $id, $attributesTypes[0]);
        array_splice($atribut, 0, 1);
        array_splice($attributesTypes, 0, 1);
        foreach ($atribut as $key => $atribut){
            $req->bindParam($atribut, $data[$key], $attributesTypes[$key]);
            
        }
        $req->execute();
    }


    public function delete($id){
        $db = $this->dbConnect();
        $atribut = $this->attributes[0];
        $attributesTypes = $this->attributesTypes[0];
        $req = $db->prepare('DELETE FROM '.$this->table.' WHERE '.$atribut.' = :'.$atribut);
        $req->bindParam($atribut, $id, $attributesTypes);
        var_dump($id);
        $req->execute();
    }

    public function count(){
        $db = $this->dbConnect();
        $table = $this->table;
        $req = $db->prepare("SELECT COUNT(id) FROM ". $table );
        $req->bindParam($table, $table, PDO::PARAM_STR);
        $req->execute();
        $donnes = $req->fetch();
        return $donnes;
         
    }
}
