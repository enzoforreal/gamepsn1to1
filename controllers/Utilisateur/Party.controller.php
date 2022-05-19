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

    public function getRoomByFilter($filterKey) {
        if(!isset($filterKey) && empty($filterKey)) {
            echo json_encode(["msg" => "Query empty", "error"=>true]);
            return;
        }

        $datas = $this->partyManager->getRoomByFilter($filterKey);
        echo json_encode(["msg" => $datas, "error" => false]);
        return;
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

    public function validationCreerParty($login,$bet,$platform,$game){
       
       $checkisCreated = ($this->partyManager->verifyIFpartyExist($login) > 0 ? false : 
        $this->partyManager->bdcreePartie($login,$bet,$platform,$game));

                  return $checkisCreated ;
      
      }

public function afficherPageRoomPartie($idParty){
        $datas = $this->partyManager->getPartyById($idParty);
        
        if(!empty($datas['idParty']) && isset($datas['idParty'])) {
            $data_page = [
                "page_description" => "Page salle partie",
                "page_title" => "Page salle partie",
                "party" => $datas,
                "page_javascript" => ['roomParty.js'],
                "view" => "views/Utilisateur/roomParty.view.php",
                "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
        } else {
            parent::pageErreur("Aucune party trouvée !", 404);
        }
         
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


      

     
}