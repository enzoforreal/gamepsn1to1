<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Utilisateur/Party.model.php");

class PartyController extends mainController{
      
      private $partyManager ;

      public function __construct()
      {
            $this->partyManager = new PartyManager();
      }
      

       public function partie(){
       
           $parties = $this->partyManager->getParties();
 
        

         $data_page = [
            "page_description" => "Page partie",
            "page_title" => "Page partie",
            "party" => $parties,
            "page_javascript" => ['partie.js'],
            "view" => "views/Utilisateur/partie.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);

    }


      public function afficherPageCreerPartie(){
        $datas = $this->partyManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

         $data_page = [
            "page_description" => "Page de création partie",
            "page_title" => "Page de création partie",
            "utilisateur" => $datas,
            "page_javascript" => ['creerPartie.js'],
            "view" => "views/Utilisateur/creerPartie.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);

    }

public function afficherPageRoomPartie(){
        $datas = $this->partyManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

         $data_page = [
            "page_description" => "Page salle partie",
            "page_title" => "Page salle partie",
            "party" => $datas,
            "page_javascript" => ['roomParty.js'],
            "view" => "views/Utilisateur/roomParty.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

public function afficherPageShowGames(){
        $datas = $this->partyManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

         $data_page = [
            "page_description" => "Page des jeux",
            "page_title" => "Page des jeux",
            "party" => $datas,
            "page_javascript" => ['showGames.js'],
            "view" => "views/Utilisateur/showGames.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }


      public function validationCreerParty($login){
       
      $this->partyManager->bdcreePartie($login);
      
      }

     public function displayParties(){
           $this->partyManager->getParties();
     }
}