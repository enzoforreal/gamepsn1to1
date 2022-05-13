<?php 
require_once("./models/MainManager.model.php");
require_once("./models/Utilisateur/Utilisateur.model.php");

class PartyManager extends MainManager {

      public function bdcreePartie($login){
          

            $req = "INSERT INTO party (login,login_1,score,statut) VALUES (:login , :login_1 , '?-?',0)";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":login",$login,PDO::PARAM_STR);
            $stmt->bindValue(":login_1",$login,PDO::PARAM_STR);
            $stmt->execute();
            $estcrée = ($stmt->rowCount() > 0);
            $stmt->closeCursor();
            return $estcrée;
      }

      public function getUserInformation($login){
        $req = "SELECT * FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
      
      public function getPartieInformation($id){
            $req = "SELECT  * FROM party WHERE id = :id ";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":id",$id,PDO::PARAM_STR);
            $stmt->execute();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultat;
      }

      public function bdjoinPartie($login_1)
      {

      $userB = $this->getPartieInformation($login_1);
      if($userB == "disponible"){
                  // requete SQL POUR INSERER le userB(login_1)
                  $req = "INSERT INTO party (login_1)VALUES (:login)";
                  $stmt = $this->getBdd()->prepare($req);
                  $stmt->bindValue(":login_1",$login_1,PDO::PARAM_STR);
                  $stmt->execute();
                  $join = ($stmt->rowCount() > 0);
                  $stmt->closeCursor();
                  return $join;
            }else{
         return false;   
            }
      }
      // public function getPartiesById($id){
      //   $req = "SELECT * FROM party WHERE id = :id";
      //   $stmt = $this->getBdd()->prepare($req);
      //   $stmt->bindValue(":id",$id,PDO::PARAM_INT);
      //   $stmt->execute();
      //   $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //   $stmt->closeCursor();
      //   return $resultat;
      // }

}