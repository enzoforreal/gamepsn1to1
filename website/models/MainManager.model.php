<?php
require_once("./models/Model.class.php");

class MainManager extends Model
{
    public function bdIsRoutePresent($route)
    {
        $req = "SELECT COUNT(1) FROM logs WHERE route = :route > 0";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":route", $route, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return ($resultat['COUNT(1)'] === "1");
    }

    public function bdInsertLog($route)
    {
        $req = "INSERT INTO logs (route, loggedVisits, visitorsVisits) VALUES (:route, 0, 0)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":route", $route, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();
    }

    public function bdAddLog($route, $isLogged)
    {
        $req = $isLogged ? "UPDATE logs SET loggedVisits = loggedVisits + 1 WHERE route=:route" :
            "UPDATE logs SET visitorsVisits = visitorsVisits + 1 WHERE route=:route";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":route", $route, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();
    }

    
    public function bdGetLogs()
    {
        $req = "SELECT * FROM logs";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
}