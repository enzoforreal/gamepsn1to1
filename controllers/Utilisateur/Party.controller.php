<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Utilisateur/Party.model.php");

class PartyController extends mainController{
      
      private $partyManager ;

      public function __construct()
      {
            $this->partyManager = new PartyManager();
      }
      
      public function validationCreerParty($login){
       
      $this->partyManager->bdcreePartie($login);
      
      }

     public function displayParties($id){
           $this->partyManager->getPartiesById($id);
     }
}