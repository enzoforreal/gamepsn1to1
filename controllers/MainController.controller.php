<?php
require_once("controllers/Toolbox.class.php");
require_once("./models/MainManager.model.php");

abstract class MainController
{
    protected function logTraffic($data)
    {
        $MainManager = new MainManager;
        $utilisateurManager = new UtilisateurManager;
        $isConnected = Securite::estConnecte();
        if (!$MainManager->bdIsRoutePresent($data['view'])) {
            $MainManager->bdInsertLog($data['view']);
        } else {
            $MainManager->bdAddLog($data['view'], $isConnected);
        }
        if ($isConnected) {
            $infos = $utilisateurManager->getUserInformation($_SESSION['profil']['login']);
            $utilisateurManager->bdSetIp($infos['login'], $_SERVER['REMOTE_ADDR']);
            $utilisateurManager->bdUpdateLastSeen($infos['login']);
        }
    }

    protected function genererPage($data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
        $this->logTraffic($data);
    }

    protected function pageErreur($msg)
    {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/erreur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}
