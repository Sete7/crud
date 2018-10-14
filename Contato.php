<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contato
 *
 * @author junio
 */
class Contato {

    //put your code here
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=info;host=localhost", "root", "");
    }

    public function readyAll() {
        $sql = "SELECT * FROM contato";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0):
            return $sql->fetchAll();
        else:
            return array();
        endif;
    }

    public function insertDado($nome, $email) {

        if ($this->existirEmail($email) == false):
            $sql = "INSERT INTO contato (nome,email) VALUES (:nome,:email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();
            return true;
        else:
            return false;
        endif;
    }
    
    public function returnDado($id){
        
        $sql = "SELECT * FROM contato WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0 ):
            return $sql->fetch();
        else:
            return false;
        endif;
        
    }
    
    public function updateDado($nome,$email,$id){
        $emailExistente = $this->existirEmail($email);
        if (!assert($emailExistente)):           
            $sql = "UPDATE contato SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $id);
            $sql->execute();            
            return true;                      
        else:   
            return FALSE;
        endif;
        
    }

    public function delete($id) {

        $sql = "DELETE FROM contato WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function existirEmail($email) {
        $sql = "SELECT * FROM contato WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
             $array = $sql->fetch();
         $array = $sql->fetch();
    }
    }

}
