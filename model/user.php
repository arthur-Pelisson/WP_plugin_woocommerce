<?php

class user extends database {

    private $conn;

    function __construct() {
        
        $this->conn = parent::__construct();

        
    }
    
    protected function getAll() {
        $bdd = $this->conn->prepare("SELECT EscapeShopUser.id, EscapeShopUser.email, EscapeShopUser.password, EscapeShopUser.nbr_game,id_escapeGameShope.id AS escapeId, id_escapeGameShope.name
        FROM EscapeShopUser INNER JOIN id_escapeGameShope ON EscapeShopUser.fk_id_escapeGame = id_escapeGameShope.id ORDER BY EscapeShopUser.id");
        $bdd->execute();
        $result = $bdd->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    protected function CreateUSer($infoUser) {
        if ($this->checkIfPasswordExist($infoUser['password'])) {
            $bdd = $this->conn->prepare("INSERT INTO EscapeShopUser (id, email, password, nbr_game, fk_id_escapeGame) VALUES (NULL, :email, :password, :nbr_game, :fk_id_escapeGame)");
            $bdd->bindParam(":email", $infoUser['email'], PDO::PARAM_STR);
            $bdd->bindParam(":password", $infoUser['password'], PDO::PARAM_STR);
            $bdd->bindParam(":nbr_game", $infoUser['nbr_game'], PDO::PARAM_STR);
            $bdd->bindParam(":fk_id_escapeGame", $infoUser['product_id'], PDO::PARAM_STR);
            if($bdd->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $utils = new utils();
            $password = $utils->setPassword(rand(10, 12));
            $infoUser['password'] = $password;
            $this->CreateUSer($infoUser);
        }
    }

    protected function checkIfPasswordExist($password) {
        $request = $this->conn->prepare("SELECT id FROM `EscapeShopUser` WHERE password = :password");
        $request->bindParam(":password", $password, PDO::PARAM_STR);
        $request->execute();
        $result = $request->fetchAll();
        if ($result < 0) {
            return false;
        } else {
            return true;
        }
    }

    protected function getAllEscape() {
        $bdd = $this->conn->prepare("SELECT * FROM `id_escapeGameShope`");
        $bdd->execute();
        $result = $bdd->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }



    

    public function getUserById($id) {
        $bdd = $this->conn->prepare("SELECT EscapeShopUser.id, EscapeShopUser.email, EscapeShopUser.password, EscapeShopUser.nbr_game,id_escapeGameShope.id AS escapeId, id_escapeGameShope.name
         FROM EscapeShopUser INNER JOIN id_escapeGameShope ON EscapeShopUser.fk_id_escapeGame = id_escapeGameShope.id WHERE EscapeShopUser.id = :id");
        $bdd->bindparam(':id', $id, PDO::PARAM_INT);
        $bdd->execute();
        $result = $bdd->fetch(PDO::FETCH_OBJ);
        // var_dump($result);
        return $result;
    }

    


   


    public function updateUserById($id, $email, $password, $nbrGame, $escapeGame) {
       $bdd = $this->conn->prepare("UPDATE `EscapeShopUser` SET `email` = :email,`password` = :password ,`nbr_game` = :nbrGame,`fk_id_escapeGame` = :escapeGame WHERE id = :id");
       $bdd->bindparam(':id', $id, PDO::PARAM_INT);
       $bdd->bindparam(':email', $email, PDO::PARAM_STR);
       $bdd->bindparam(':password', $password, PDO::PARAM_STR);
       $bdd->bindparam(':nbrGame', $nbrGame, PDO::PARAM_INT);
       $bdd->bindparam(':escapeGame', $escapeGame, PDO::PARAM_INT);
       if ($bdd->execute()) {
           return true;
       } else {
           return false;
       }

    }

    public function deleteUserById($id) {
        $bdd = $this->conn->prepare("DELETE FROM `EscapeShopUser` WHERE id = :id");
        $bdd->bindparam(":id", $id, PDO::PARAM_INT);
        if ($bdd->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

