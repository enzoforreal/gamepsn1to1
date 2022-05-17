<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Administrateur/Administrateur.model.php");

class AdministrateurController extends MainController
{
    private $administrateurManager;
    private $MainManager;

    public function __construct()
    {
        $this->administrateurManager = new AdministrateurManager();
        $this->MainManager = new MainManager;
    }

    public function droits()
    {
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

    public function validation_modificationRole($login, $role)
    {
        if ($this->administrateurManager->bdModificationRoleUser($login, $role)) {
            Toolbox::ajouterMessageAlerte("La modification a été prise en compte", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::ajouterMessageAlerte("La modification n'a pas été prise en compte", Toolbox::COULEUR_ROUGE);
        }
        header("Location: " . URL . "administration/droits");
    }

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
