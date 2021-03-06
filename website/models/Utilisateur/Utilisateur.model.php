<?php
require_once("./models/MainManager.model.php");

class UtilisateurManager extends MainManager
{

    public function checkBalance($login, $amount){
        $r = $this->getBdd()->prepare("SELECT * FROM utilisateur WHERE login = ?");
        $r->execute([
            $login
        ]);

        $d = $r->fetch();
        if($d["balance"] >= $amount) {
            return true;
        }

        return false;
    }

    private function getPasswordUser($login)
    {
        $req = "SELECT password FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['password'];
    }

    public function isCombinaisonValide($login, $password)
    {
        $passwordBD = $this->getPasswordUser($login);
        return password_verify($password, $passwordBD);
    }

    public function estCompteActive($login)
    {
        $req = "SELECT est_valide FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return ((int)$resultat['est_valide'] === 1) ? true : false;
    }

    public function getUserInformation($login)
    {
        $req = "SELECT * FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }

    public function getAllUsers(){
            $u = "SELECT * FROM utilisateur ORDER BY rank";
            $users = $this->getBdd()->prepare($u);
            $users->execute();
            $results = $users->fetchAll();

            return $results;

        

    }

    public function getFollowersByLogin($login) {
        $d = $this->getBdd()->prepare("SELECT * FROM followers INNER JOIN utilisateur ON utilisateur.login = followers.ownLogin WHERE followers.followerLogin = ?");
        $d->execute([
            $login
        ]);
        
        return $d->fetchAll();
    }

    public function addFollowerByLogin($ownLogin, $followerLogin) {
        $d = $this->getBdd()->prepare("INSERT INTO followers (followerLogin, ownLogin) VALUES(?, ?)");
        $d->execute([
            $followerLogin, 
            $ownLogin
        ]); 
    }


    public function getUserWalletInformation($login){
        $query = "SELECT * FROM wallet WHERE login = ?";
        $wallet = $this->getBdd()->prepare($query);
        $wallet->execute(["login" => $_SESSION['login'].$login]);

        $results = $wallet->fetch(PDO::FETCH_ASSOC);
        

        return $results;


    }

    public function bdCreerCompte($login,$pseudoPlatform,$platform, $passwordCrypte, $mail, $clef, $image, $role, $birthdate, $telephone, $country)
    {
        $req = "INSERT INTO utilisateur (login,pseudoPlatform,platform, password, mail, est_valide, role, clef, image, 
        numberOfBans , numberOfConnections, totalPoints , numberOfWins,numberOfDefeats, numberOfDraws, birthdate, telephone, country ,nbFollowers, isBanned)
        VALUES (:login, :pseudoPlatform, :platform, :password, :mail, 0, :role, :clef, :image , 0, 0, 0, 0, 0, 0, :birthdate , :telephone, :country, 0, 0)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":pseudoPlatform", $pseudoPlatform, PDO::PARAM_STR);
        $stmt->bindValue(":platform", $platform, PDO::PARAM_STR);
        $stmt->bindValue(":password", $passwordCrypte, PDO::PARAM_STR);
        $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
        $stmt->bindValue(":clef", $clef, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":role", $role, PDO::PARAM_STR);
        $stmt->bindValue(":birthdate", $birthdate, PDO::PARAM_STR);
        $stmt->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $stmt->bindValue(":country", $country, PDO::PARAM_STR);

        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function verifLoginDisponible($login)
    {
        $utilisateur = $this->getUserInformation($login);
        return empty($utilisateur);
    }

    public function bdValidationMailCompte($login, $clef)
    {
        $req = "UPDATE utilisateur set est_valide = 1 WHERE login = :login and clef = :clef";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":clef", $clef, PDO::PARAM_INT);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function bdModificationMailUser($login, $mail)
    {
        $req = "UPDATE utilisateur set mail = :mail WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function bdUpdateLastSeen($login)
    {
        $req = "UPDATE utilisateur SET lastSeen = NOW() WHERE login =:login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function bdGetUsersActive()
    {
        $req = "SELECT COUNT(*) FROM utilisateur WHERE lastSeen > DATE_SUB(NOW(), INTERVAL 5 MINUTE)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['COUNT(*)'];
    }

    public function bdModificationPassword($login, $password)
    {
        $req = "UPDATE utilisateur set password = :password WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function bdSuppressionCompte($login)
    {
        $req = "DELETE FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function bdAjoutImage($login, $image)
    {
        $req = "UPDATE utilisateur set image = :image WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function bdSetIp($login, $ip)
    {
        $req = "UPDATE utilisateur set lastIP = :ip WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":ip", $ip, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function getImageUtilisateur($login)
    {
        $req = "SELECT image FROM utilisateur WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['image'];
    }
}