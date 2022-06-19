<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Administrateur/Administrateur.model.php");



class AdministrateurController extends MainController{
    private $administrateurManager;
    private $MainManager;

    public function __construct(){
        $this->administrateurManager = new AdministrateurManager();
        $this->MainManager = new MainManager;
    } 

    public function droits(){
        $utilisateurs = $this->administrateurManager->getUtilisateurs();

        $data_page = [
            "page_description" => "Gestion des droits",
            "page_title" => "Gestion des droits",
            "utilisateurs" => $utilisateurs,
            "view" => "views/Administrateur/droits.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function getAccountUsers(){
        $utilisateurs = $this->administrateurManager->getUtilisateurs();

        $data_page = [
            "page_description" => "Account users",
            "page_title" => "Account users",
            "utilisateurs" => $utilisateurs,
            "view" => "views/Administrateur/accountUsers.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function validation_modificationRole($login,$role){
        if($this->administrateurManager->bdModificationRoleUser($login,$role)){
            Toolbox::ajouterMessageAlerte("La modification a été prise en compte", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::ajouterMessageAlerte("La modification n'a pas été prise en compte", Toolbox::COULEUR_ROUGE);
        }
        header("Location: ".URL."administration/droits");
    }

     public function logs()
    {
        $logs = $this->MainManager->bdGetLogs();

        $data_page = [
            "page_description" => "Affichage des logs",
            "page_title" => "Affichage des logs",
            "logs" => $logs,
            "view" => "views/Administrateur/logs.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }


    public function payments(){

        $payments = $this->MainManager->bdGetPayments();

        $data_page = [
            "page_description" => "history of payments",
            "page_title" => "history of payments",
            "payments" => $payments,
            "view" => "views/Administrateur/payments.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function getWithdrwals(){

        $withdraw = $this->MainManager->bdGetWithdrawals();

        $data_page = [
            "page_description" => "history of wihtdrawals",
            "page_title" => "history of wihtdrawals",
            "withdraws" => $withdraw,
            "view" => "views/Administrateur/withdrawal.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }



    public function getRoomsParty(){

         $parties = $this->MainManager->getParties();

        $data_page = [
            "page_description" => "historical of parties",
            "page_title" => "historical of parties",
            "parties" => $parties,
            "view" => "views/Administrateur/parties.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);

    }


  


}