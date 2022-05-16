<?php 
require_once("./models/MainManager.model.php");
require_once("./models/Utilisateur/Utilisateur.model.php");

class PartyManager extends MainManager {

      public function bdcreePartie($login){
          

            $req = "INSERT INTO party (login,login_1,score) VALUES( :login ,'en_attente_joueur','?-?');";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":login",$login,PDO::PARAM_STR);
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
      
      public function getParties(){
        $req = $this->getBdd()->prepare("SELECT * FROM party" );
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
      }

       public function getPartyById($idParty){
        $req = $this->getBdd()->prepare("SELECT * FROM party WHERE idParty = ?" );
        $req->execute([
            intval(htmlspecialchars($idParty))
        ]);
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
      }
      

      public function getRoomByFilter($filter) {
            
            $req = $this->getBdd()->prepare('SELECT * FROM party WHERE game LIKE :filter_key');
            $req->execute([
                  ':filter_key' => '%'.htmlspecialchars($filter).'%'
            ]);

            $datas = $req->fetchAll(PDO::FETCH_ASSOC);
            return $datas;
      }

      public function bdjoinPartie($login)
      {

      $userB = $this->getParties($login);
      if($userB == "disponible"){
                  // requete SQL POUR INSERER le userB(login_1)
                  $req = "INSERT INTO party (login_1)VALUES (:login)";
                  $stmt = $this->getBdd()->prepare($req);
                  $stmt->bindValue(":login",$login,PDO::PARAM_STR);
                  $stmt->execute();
                  $join = ($stmt->rowCount() > 0);
                  $stmt->closeCursor();
                  return $join;
            }else{
         return false;   
            }
      }
  

}