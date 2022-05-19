<?php 
require_once("./models/MainManager.model.php");
require_once("./models/Utilisateur/Utilisateur.model.php");

class PartyManager extends MainManager {


      public function verifyIFpartyExist($login){
            $verifyParty = $this->getBdd()->prepare('SELECT * FROM party WHERE login = ? ');
            $verifyParty->execute([
                 $login
                  
            ]);
            $datas = $verifyParty->fetch(PDO::FETCH_ASSOC);
            return $datas;
      }

      public function bdcreePartie($login){
            
            $req = "INSERT INTO party (login,login_1,score) VALUES( :login ,'en_attente_joueur','?-?');";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":login",$login,PDO::PARAM_STR);
            $stmt->execute();
            $estcrée = ($stmt->rowCount() > 0);
            $stmt->closeCursor();
            return $estcrée;
            
           return false;
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


    
  

}