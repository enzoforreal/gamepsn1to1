<?php 
require_once("./models/MainManager.model.php");
require_once("./models/Utilisateur/Utilisateur.model.php");

class PartyManager extends MainManager {


      public function verifyIFpartyExist($login){
            $verifyParty = $this->getBdd()->prepare('SELECT * FROM party WHERE (login = ? OR login_1 = ?)');
            $verifyParty->execute([
                 $login,
                 $login
                  
            ]);
            $datas = $verifyParty->fetch(PDO::FETCH_ASSOC);
            return $datas;
      }

      public function bdcreePartie($login,$bet,$platform,$game){
            
            $req = "INSERT INTO party (login,bet,platform,game,login_1,score) VALUES( :login , :bet ,:platform,:game,'en_attente_joueur','?-?');";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":login",$login,PDO::PARAM_STR);
            $stmt->bindValue(":bet",$bet,PDO::PARAM_INT);
            $stmt->bindValue(":platform",$platform,PDO::PARAM_STR);
            $stmt->bindValue(":game",$game,PDO::PARAM_STR);
            $stmt->execute();
            $estcrée = ($stmt->rowCount() > 0);
            $stmt->closeCursor();
            return $estcrée;
            
           return false;
      } 


       public function userJoinParty($idParty,$login){

            $lol = $this->getBdd()->prepare("SELECT * FROM party WHERE login_1 = ?");
            $lol->execute([
                  $login
            ]);
            if($lol->rowCount() > 0) {
                  return 4;
            }

            $verify = $this->getBdd()->prepare("SELECT * FROM party WHERE login = ?");
            $verify->execute([
                  $login
            ]);
            if($verify->rowCount() > 0) {
                  return 5;
            }
            
            $verifyParty = $this->getBdd()->prepare('SELECT * FROM party WHERE idParty = ? ');
            $verifyParty->execute([
                  $idParty
            ]);
            $datas = $verifyParty->fetch(PDO::FETCH_ASSOC);
            if($datas["login_1"] !== "en_attente_joueur"){
                  return 3 ;
            }
            if($datas['login_1'] === $login){
                  return 2 ;
            }
            $update = $this->getBdd()->prepare("UPDATE party  SET login_1 = ? WHERE idParty= ?");
            $update->execute([
                  $login,
                  $idParty

            ]);
            return 1;
           
           
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
      
      public function getMyPartiesBy($login){
             $req = $this->getBdd()->prepare("SELECT * FROM party WHERE (login = ? OR login_1 = ?)" );
             $req->execute([$login, $login]);
             $datas = $req->fetchAll(PDO::FETCH_ASSOC);
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