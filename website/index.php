<?php

session_start();
 
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));
 
require_once("./controllers/Toolbox.class.php");
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");
require_once("./controllers/Utilisateur/Party.controller.php");
require_once("./controllers/Administrateur/Administrateur.controller.php");
$visiteurController = new VisiteurController();
$private_key = '633d6A7c43E845ddC2fA124eCdd3a1578689DD512B70c021239DB63dE1397146';
$public_key = '9ad706ac6e25c819e6e253dd4cfab34f8aa3cdf177671dccc9d4bb9664410065';
$format = 'json';
$utilisateurController = new UtilisateurController();
$partyController = new PartyController();
$administrateurController = new AdministrateurController();
 
try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }
 
    switch ($page) {
        case "accueil":
            $visiteurController->accueil();
            break;
        case "login":
            $visiteurController->login();
            break;
        case "validation_login":
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $utilisateurController->validation_login($login, $password);
            } else {
                Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "login");
            }
            break;
        case "creerCompte":
            $visiteurController->creerCompte();
            break;
        case "validation_creerCompte":
            if (
                !empty($_POST['login']) && !empty($_POST['pseudoPlatform']) && !empty($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['birthdate'])
                && !empty($_POST['telephone']) && !empty($_POST['country'])
            ) {
                $login = Securite::secureHTML($_POST['login']);
                $pseudoPlatform = securite::secureHTML($_POST['pseudoPlatform']);
                $platform = $_POST['platform'];
                $password = Securite::secureHTML($_POST['password']);
                $mail = Securite::secureHTML($_POST['mail']);
                $birthdate = $_POST['birthdate'];
                $telephone = Securite::secureHTML($_POST['telephone']);
                $country = $_POST['country'];
 
 
                $utilisateurController->validation_creerCompte($login, $pseudoPlatform, $platform, $password, $mail, $birthdate, $telephone, $country);
            } else {
                Toolbox::ajouterMessageAlerte("Les 7 informations sont obligatoires !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "creerCompte");
            }
            break;
        case "renvoyerMailValidation":
            $utilisateurController->renvoyerMailValidation($url[1]);
            break;
        case "validationMail":
            $utilisateurController->validation_mailCompte($url[1], $url[2]);
            break;
        case "compte":
            if (!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "login");
            } elseif (!Securite::checkCookieConnexion()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous reconnecter !", Toolbox::COULEUR_ROUGE);
                setcookie(Securite::COOKIE_NAME, "", time() - 3600);
                unset($_SESSION["profil"]);
                header("Location: " . URL . "login");
            } else {
                Securite::genererCookieConnexion(); //regénération du cookie
                switch ($url[1]) {
                    case "profil":
                        if(!empty($_SESSION['profil']['login'])){
                            $utilisateurController->profil();
                        }
                        break;
                        case"pageTransfer": $utilisateurController->createTransfer();
                            break;
                        case "deposit_money" : 
                            if(isset($_POST['amount']) && !empty($_POST['amount'])) {
                                $utilisateurController->callApiPayment($private_key,$public_key,$format,floatval($_POST['amount']), $_SESSION['profil']['login']);

                            } else {
                                //
                            }
                            break;
                        case "ipn":
                            $utilisateurController->ipnHandler();
                            break;
                        case "myParties":
                        if ($_SESSION['profil']['login']) {
                            $login = $_SESSION['profil']['login'];
 
                            $partyController->getMyParties($login);
                            break;
                        }
                    case "deconnexion":
                        $utilisateurController->deconnexion();
                        break;
                    case "token":
                        $utilisateurController->getToken();
                        break;
                    case "validation_modificationMail":
                        $utilisateurController->validation_modificationMail(Securite::secureHTML($_POST['mail']));
                        break;
                    case "modificationPassword":
                        $utilisateurController->modificationPassword();
                        break;
                    case "validation_modificationPassword":
                        if (!empty($_POST['ancienPassword']) && !empty($_POST['nouveauPassword']) && !empty($_POST['confirmNouveauPassword'])) {
                            $ancienPassword = Securite::secureHTML($_POST['ancienPassword']);
                            $nouveauPassword = Securite::secureHTML($_POST['nouveauPassword']);
                            $confirmationNouveauPassword = Securite::secureHTML($_POST['confirmNouveauPassword']);
                            $utilisateurController->validation_modificationPassword($ancienPassword, $nouveauPassword, $confirmationNouveauPassword);
                        } else {
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas renseigné toutes les informations", Toolbox::COULEUR_ROUGE);
                            header("Location: " . URL . "compte/modificationPassword");
                        }
                        break;
                    case "suppressionCompte":
                        $utilisateurController->suppressionCompte();
                        break;
                    case "validation_modificationImage":
                        if ($_FILES['image']['size'] > 0) {
                            $utilisateurController->validation_modificationImage($_FILES['image']);
                        } else {
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas modifié l'image", Toolbox::COULEUR_ROUGE);
                            header("Location: " . URL . "compte/profil");
                        }
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
            }
            break;
        case "partie":
            $partyController->partie();
            break;
        case "roomFilter":
            $partyController->getRoomByFilter($_POST['filterKey']);
            break;
        case "showGames":
            $utilisateurController->afficherPageShowGames();
            break;
        case "creerPartie":
            $partyController->afficherPageCreerPartie();
            break;
        case "trending":
            $utilisateurController->afficherPageTrending();
            break;
        case "apropos":
            $visiteurController->afficherPageAPropos();
            break;
        case "ranking":
            $utilisateurController->afficherPageRanking();
            break;
        case "showGames":
            $utilisateurController->afficherPageShowGames();
            break;
        case "ValidationCreerParty":
            if (
                !empty($_POST['login']) && !empty($_POST['bet']) &&
                !empty($_POST['platform']) && !empty($_POST['game'])
            ) {
 
                $login = Securite::secureHTML($_POST['login']);
                $bet =  intval(securite::secureHTML($_POST['bet']));
                $platform = Securite::secureHTML($_POST['platform']);
                $game = Securite::secureHTML($_POST['game']);
                $partyCreateStatus = $partyController->validationCreerParty($login, $bet, $platform, $game);
                if (!$partyCreateStatus) {
                    Toolbox::ajouterMessageAlerte("Your part could not be created, you already have a part in progress, please finish your party in progress before creating another one  ", Toolbox::COULEUR_ROUGE);
                    header("Location: " . URL . "creerPartie");
                } else {
                    Toolbox::ajouterMessageAlerte("Your party was be created with a success", Toolbox::COULEUR_VERTE);
                    header("Location: " . URL . "partie");
                }
            } else {
                Toolbox::ajouterMessageAlerte("Your party could not be created, Contact our support", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "creerPartie");
            }
            break;
 
        case "roomParty":
            $partyController->afficherPageRoomPartie($_GET['idParty']);
            break;
         case "userJoin" :  if(!empty($_POST['login_1'])){
            $login = Securite::secureHTML($_POST['login_1']);
            $idParty = Securite::secureHTML($_POST['idParty']);
            
            $partyJoinStatus =  $partyController->JoinParty($idParty,$login);
           
           if($partyJoinStatus == 3){
                Toolbox::ajouterMessageAlerte("the room is full !",Toolbox::COULEUR_ROUGE);
                 header("Location: ".URL."roomParty&idParty=".$idParty);
           }else if($partyJoinStatus == 2){
                 Toolbox::ajouterMessageAlerte(" You already join on this room !",Toolbox::COULEUR_ROUGE);
                 header("Location: ".URL."roomParty&idParty=".$idParty);
           }else if($partyJoinStatus == 1){
               
                    Toolbox::ajouterMessageAlerte(" success !",Toolbox::COULEUR_VERTE);
                 header("Location: ".URL."roomParty&idParty=".$idParty);
           } else if($partyJoinStatus === 4) {
               Toolbox::ajouterMessageAlerte("You are already on the party", Toolbox::COULEUR_ROUGE);
               header("Location: ".URL."roomParty&idParty=".$idParty);
           }else if($partyJoinStatus === 5){
                Toolbox::ajouterMessageAlerte("You are already  on the party ", Toolbox::COULEUR_ROUGE);
               header("Location: ".URL."roomParty&idParty=".$idParty);
           }
        }   
          break;
        case "showGames":
            $partyController->afficherPageShowGames();
            break;
 
 
        case "administration":
            if (!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "Login");
            } elseif (!Securite::estAdministrateur()) {
                Toolbox::ajouterMessageAlerte("Vous n'avez le droit d'être ici", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "accueil");
            } else {
                switch ($url[1]) {
                    case "droits":
                        $administrateurController->droits();
                        break;
                    case "logs":
                        $administrateurController->logs();
                        break;
                    case "validation_modificationRole":
                        $administrateurController->validation_modificationRole($_POST['login'], $_POST['role']);
                        break;
 
                    default:
                        throw new Exception("La page n'existe pas");
                }
            }
            break;
 
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $visiteurController->pageError($e->getMessage(), 403);
}