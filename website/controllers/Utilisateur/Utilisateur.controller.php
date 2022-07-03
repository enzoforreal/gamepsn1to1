<?php
require_once("./controllers/MainController.controller.php");
require_once("Payments.controller.php");
require_once("./models/Utilisateur/Utilisateur.model.php");
require_once("./models/Utilisateur/Payments.model.php");

class UtilisateurController extends MainController
{
    private $utilisateurManager;
    private $paymentManager;


    public function __construct()
    {
        $this->utilisateurManager = new UtilisateurManager();   
         
    }


    public function callApiPayment($private_key, $public_key, $format, $amount, $login){ 


        /** Scenario: Create a complex transaction that uses all available fields. **/

        // Create a new API wrapper instance
        $cps_api = new CoinpaymentsAPI($private_key, $public_key, $format);

        // The currency for the amount above (original price)
        $currency1 = 'EUR';

        // Litecoin Testnet is a no value currency for testing
        // The currency the buyer will be sending equal to amount of $currency1
        $currency2 = 'LTCT';
        
        // Enter a buyer name for later reference
        $buyer_name = $login;
        $buyer_email = 'lol@gmail.com';
        $address = '';

        // Enter additional transaction details
        $item_name = 'New transaction wallet';
        $item_number = '';
        $ipn_url = URL."ipn";
        $invoice = '';
        $custom = '';

        // Make call to API to create the transaction
        try {
            $transaction_response = $cps_api->CreateComplexTransaction($amount, $currency1, $currency2, $buyer_email, $address,
            $buyer_name, $item_name, $item_number, $invoice, $custom, $ipn_url);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }

        // Output the response of the API call
        if ($transaction_response["error"] == "ok") {
            $payment = new PaymentsManager();
            $payment->createTransaction($login, $transaction_response["result"]["txn_id"], 'EUR', $amount, 'LTCT', $transaction_response["result"]["amount"], "pending");
            $data_page = [
            "page_description" => "Page of payment",
            "page_title" => "Page of payment",
            "datas" => $transaction_response,
            "page_javascript" => ['profil.js'],
            "view" => "views/Utilisateur/payment.view.php",
            "template" => "views/common/template.php"
            ];
            return $this->genererPage($data_page);

        } else {
         toolbox::ajouterMessageAlerte($transaction_response['error'],Toolbox::COULEUR_ROUGE);
         header("Location: ".URL."payment");
        }

        


}

    public function errorAndDie($error_msg) {
            $cp_debug_email = 'enzoforreal@gmail.com';
            if (!empty($cp_debug_email)) {
                $report = 'Error: '.$error_msg."\n\n";
                $report .= "POST Data\n\n";
                foreach ($_POST as $k => $v) {
                    $report .= "|$k| = |$v|\n";
                }
                file_put_contents("debugIPN.txt", $report);

                mail($cp_debug_email, 'CoinPayments IPN Error', $report);
            }
            die('IPN Error: '.$error_msg);
        }

    public function ipnHandler()
    {
        // Fill these in with the information from your CoinPayments.net account.
        $cp_merchant_id = '8b6143dd4d812bb5f7312d46239b110a';
        $cp_ipn_secret = 'pQrualVvv7';
        

        $payment = new PaymentsManager();

        $payment->debug("dans l'ipn ".$_SERVER['HTTP_USER_AGENT']." ip:".$_SERVER['REMOTE_ADDR']);

        
        if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
            $this->errorAndDie('IPN Mode is not HMAC');
        }

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            $this->errorAndDie('No HMAC signature sent.');
        }

        $request = file_get_contents('php://input');
        if ($request === FALSE || empty($request)) {
            $this->errorAndDie('Error reading POST data');
        }

        if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) {
            $this->errorAndDie('No or incorrect Merchant ID passed');
        }

        $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
        if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) {
        //if ($hmac != $_SERVER['HTTP_HMAC']) { <-- Use this if you are running a version of PHP below 5.6.0 without the hash_equals function
            $this->errorAndDie('HMAC signature does not match');
        }

        // HMAC Signature verified at this point, load some variables.

        $ipn_type = $_POST['ipn_type'];
        $txn_id = $_POST['txn_id'];
        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $amount1 = floatval($_POST['amount1']);
        $amount2 = floatval($_POST['amount2']);
        $currency1 = $_POST['currency1'];
        $currency2 = $_POST['currency2'];
        $status = intval($_POST['status']);
        $status_text = $_POST['status_text'];



        // Check the original currency to make sure the buyer didn't change it.
    

        $transaction = $payment->getTransactionById($txn_id);
        if ($currency1 != $transaction['from_currency']) {
            $this->errorAndDie('Original currency mismatch!');
        }

        // Check amount against order total
        if ($amount1 < $transaction["enterred_amount"]) {
            $this->errorAndDie('Amount is less than order total!');
        }
    
        if ($status >= 100 || $status == 2) {
            $payment->updatePayementByTxnId($txn_id, "success");
            $payment->addMoreBalance($transaction["enterred_amount"],$transaction["login"]);
            $payment->debug("success"); // for debug on production
        } else if ($status < 0) {
            $payment->updatePayementByTxnId($txn_id,"error");
            $payment->debug("error"); // for debug on production
        } else {
            $payment->updatePayementByTxnId($txn_id, "pending1");
            $payment->debug("pending1"); // for debug on production
        }
        die('IPN OK');
    }

    public function createWithdraw($private_key,$public_key, $format,$enterred_amount,$login,$address){
        
    // Create a new API wrapper instance
    $withdrawal = new CoinpaymentsAPI($private_key, $public_key,$format);

    $currency = 'LTCT' ;

    $currency2 = 'EUR' ;

        $buyer_name = $login;
        $buyer_email = 'test@gmail.com';
        $address = $address;
       
        // Enter additional transaction details
        $item_name = 'Withdrawal';
        $item_number = '';
        $ipn_url = URL."ipnWithdraw";
        $invoice = '';
        $custom = '';

        try{
            $withdrawal_response = $withdrawal->createWithdrawal([
                "address" => $address,
                "currency" => $currency,
                "currency2" => $currency2,
                "ipn_url" => $ipn_url,
                "amount" => intval($enterred_amount),
                "note" => "withdraw test ".$login." adress : ".$address
            ]);
        }catch(Exception $e){
            
            echo 'Error: ' . $e->getMessage();
            exit();

        }
    if ($withdrawal_response["error"] == "ok") {
        // die(print_r($withdrawal_response));
            $withdraw = new PaymentsManager();
            $withdraw->dbCreate_withdraw($withdrawal_response['result']['id'],$login,$currency2,$enterred_amount,$address,$currency,$withdrawal_response['result']['amount'],$withdrawal_response['result']['status']);
            $data_page = [
            "page_description" => "Page of withdraw",
            "page_title" => "Page of withdraw",
            "datas" => $withdrawal_response,
            "page_javascript" => ['withdraw.js'],
            "view" => "views/Utilisateur/withdrawal.view.php",
            "template" => "views/common/template.php"
            ];
            return $this->genererPage($data_page);

        } else {
         toolbox::ajouterMessageAlerte($withdrawal_response['error'],Toolbox::COULEUR_ROUGE);
         header("Location: ".URL."withdrawal");
        }

    }

       public function ipnWithdrawHandler()
    {
        // Fill these in with the information from your CoinPayments.net account.
        $cp_merchant_id = '8b6143dd4d812bb5f7312d46239b110a';
        $cp_ipn_secret = 'pQrualVvv7';
        

        $withdraw = new PaymentsManager();

        $withdraw->debug("dans l'ipn ".$_SERVER['HTTP_USER_AGENT']." ip:".$_SERVER['REMOTE_ADDR']);

        
        if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
            $this->errorAndDie('IPN Mode is not HMAC');
        }

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            $this->errorAndDie('No HMAC signature sent.');
        }

        $request = file_get_contents('php://input');
        if ($request === FALSE || empty($request)) {
            $this->errorAndDie('Error reading POST data');
        }

        if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) {
            $this->errorAndDie('No or incorrect Merchant ID passed');
        }

        $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
        if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) {
            $this->errorAndDie('HMAC signature does not match');
        }

       // HMAC Signature verified at this point, load some variables.

        $currency = $_POST['currency'] ;
        $txn_id = $_POST['txn_id'];
        $enterred_amount = $_POST['amount_enterred'];
        $currency2 = $_POST['currency2'] ;
        $amount = floatval($_POST['amount1']);
        $buyer_name = $_POST['buyer_name'] ;
        $buyer_email = $_POST['buyer_email'] ;
        $address = $_POST['address'] ;
        $item_name = $_POST['item_name'] ;
        $item_number =$_POST['item_number'] ;
        $ipn_type = $_POST['ipn_type'];
        $invoice = $_POST['currency'] ;
        $custom = $_POST['currency'] ;
        $status = intval($_POST['status']);
        
        
        // Check the original currency to make sure the buyer didn't change it.
    

        $transaction = $withdraw->getWithdrawById($txn_id);
        if ($currency2 != $transaction['from_currency']) {
            $this->errorAndDie('Original currency mismatch!');
        }

        // Check amount against order total
        if ($amount < $transaction["enterred_amount"]) {
            $this->errorAndDie('Amount is less than order total!');
        }
    
        if ($status >= 100 || $status == 2) {
            $withdraw->updateWithdrawByTxnId($txn_id, "success"); // adebug en prod probleme de nomage remettre a jour docker 
            $withdraw->deductBalance($transaction["enterred_amount"],$transaction["login"]); //adebug en prod probleme de nomage remettre a jour docker 
            $withdraw->debug("success"); // for debug on production
        } else if ($status < 0) {
            $withdraw->updateWithdrawByTxnId($txn_id,"error");
            $withdraw->debug("error"); // for debug on production
        } else {
            $withdraw->updateWithdrawByTxnId($txn_id, "pending1");
            $withdraw->debug("pending1"); // for debug on production
        }
        die('IPN OK');
    }

    public function validation_login($login, $password)
    {
        if ($this->utilisateurManager->isCombinaisonValide($login, $password)) {
            if ($this->utilisateurManager->estCompteActive($login)) {
                Toolbox::ajouterMessageAlerte("Bon retour sur le site " . $login . " !", Toolbox::COULEUR_VERTE);
                $_SESSION['profil'] = [
                "login" => $login,
                ];
                Securite::genererCookieConnexion();
                Securite::genererTokenJWT();

            header("Location: " . URL . "compte/profil");
    } else {
            $msg = "Le compte " . $login . " n'a pas été activé par mail. ";
            $msg .= "<a href='renvoyerMailValidation/" . $login . "'>Renvoyez le mail de validation</a>";
            Toolbox::ajouterMessageAlerte($msg, Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "login");
    }
    } else {
            Toolbox::ajouterMessageAlerte("Combinaison Login / Mot de passe non valide", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "login");
    }
    }
    public function profil()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

            $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "utilisateur" => $datas,
            "page_javascript" => ['profil.js'],
            "view" => "views/Utilisateur/profil.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
    }

    public function createTransfer(){
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];
            $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "utilisateur" => $datas,
            "page_javascript" => ['payment.js'],
            "view" => "views/Utilisateur/payment.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);

    }

    public function makeWithdrawal(){
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];



            $data_page = [
            "page_description" => "Page of Withdrawal ",
            "page_title" => "Page of Withdrawal",
            "utilisateur" => $datas,
            "page_javascript" => ['withdrawal.js'],
            "view" => "views/Utilisateur/withdrawal.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);

    } 

    public function displayPageFriends(){
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];



            $data_page = [
            "page_description" => "Page of friends ",
            "page_title" => "Page of friends",
            "utilisateur" => $datas,
            "page_javascript" => ['friends.js'],
            "view" => "views/Utilisateur/friends.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
    }



    public function afficherPageTrending()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

            $data_page = [
            "page_description" => "Page tendance",
            "page_title" => "Page tendance",
            "utilisateur" => $datas,
            "page_javascript" => ['trending.js'],
            "view" => "views/Utilisateur/trending.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
        }

    public function afficherPageRanking()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

            $data_page = [
            "page_description" => "Page classement",
            "page_title" => "Page classement",
            "utilisateur" => $datas,
            "page_javascript" => ['ranking.js'],
            "view" => "views/Utilisateur/ranking.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
    }

    public function afficherPageShowGames()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

            $data_page = [
            "page_description" => "Page des jeux",
            "page_title" => "Page des jeux",
            "utilisateur" => $datas,
            "page_javascript" => ['showGames.js'],
            "view" => "views/Utilisateur/showGames.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
    }

    public function partie()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

            $data_page = [
            "page_description" => "Page partie",
            "page_title" => "Page partie",
            "utilisateur" => $datas,
            "page_javascript" => ['partie.js'],
            "view" => "views/Utilisateur/partie.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
    }

    public function getToken()
    {
        echo $_SESSION['profil']["token"];
        die();
    }

    public function afficherPageRoomPartie()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
        $_SESSION['profil']["role"] = $datas['role'];

            $data_page = [
            "page_description" => "Page salle partie",
            "page_title" => "Page salle partie",
            "utilisateur" => $datas,
            "page_javascript" => ['roomParty.js'],
            "view" => "views/Utilisateur/roomParty.view.php",
            "template" => "views/common/template.php"
            ];
            $this->genererPage($data_page);
    }

    public function afficherPageCreerPartie()
    {
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);
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
    public function deconnexion()
    {
        Toolbox::ajouterMessageAlerte("La deconnexion est effectuée", Toolbox::COULEUR_VERTE);
        unset($_SESSION['profil']);
        setcookie(Securite::COOKIE_NAME, "", time() - 3600);
        header("Location: " . URL . "accueil");
    }
    public function validation_creerCompte($login, $pseudoPlatform, $platform, $password, $mail, $birthdate, $telephone,
    $country)
    {
        if ($this->utilisateurManager->verifLoginDisponible($login)) {
        $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
        $clef = rand(0, 9999);
            if ($this->utilisateurManager->bdCreerCompte($login, $pseudoPlatform, $platform, $passwordCrypte, $mail, $clef,
            "profils/profil.png", "utilisateur", $birthdate, $telephone, $country)) {
            $this->sendMailValidation($login, $mail, $clef);
            Toolbox::ajouterMessageAlerte("La compte a été créé, Un mail de validation vous a été envoyé !",
            Toolbox::COULEUR_VERTE);
            header("Location: " . URL . "login");
        } else {
            Toolbox::ajouterMessageAlerte("Erreur lors de la création du compte, recommencez !", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "creerCompte");
        }
    } else {
            Toolbox::ajouterMessageAlerte("Le login est déjà utilisé !", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "creerCompte");
        }
    }

    private function sendMailValidation($login, $mail, $clef)
    {
            $urlVerification = URL . "validationMail/" . $login . "/" . $clef;
            $sujet = "Création du compte sur le site GamePsn1to1";
            $message = "Pour valider votre compte veuillez cliquer sur le lien suivant " . $urlVerification;
            Toolbox::sendMail($mail, $sujet, $message);
    }

    public function renvoyerMailValidation($login)
    {
            $utilisateur = $this->utilisateurManager->getUserInformation($login);
            $this->sendMailValidation($login, $utilisateur['mail'], $utilisateur['clef']);
                header("Location: " . URL . "login");
    }

    public function validation_mailCompte($login, $clef)
    {
        if ($this->utilisateurManager->bdValidationMailCompte($login, $clef)) {
            Toolbox::ajouterMessageAlerte("Le compte a été activé !", Toolbox::COULEUR_VERTE);
            $_SESSION['profil'] = [
            "login" => $login,
            ];
            header('Location: ' . URL . 'compte/profil');
    } else {
            Toolbox::ajouterMessageAlerte("Le compte n'a pas été activé !", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . 'creerCompte');
        }
    }

    public function validation_modificationMail($mail)
    {
        if ($this->utilisateurManager->bdModificationMailUser($_SESSION['profil']['login'], $mail)) {
             Toolbox::ajouterMessageAlerte("La modification est effectuée", Toolbox::COULEUR_VERTE);
        } else {
                Toolbox::ajouterMessageAlerte("Aucune modification effectuée", Toolbox::COULEUR_ROUGE);
        }
        header("Location: " . URL . "compte/profil");
}

    public function modificationPassword()
    {
    $data_page = [
    "page_description" => "Page de modification du password",
    "page_title" => "Page de modification du password",
    "page_javascript" => ["modificationPassword.js"],
    "view" => "views/Utilisateur/modificationPassword.view.php",
    "template" => "views/common/template.php"
    ];
    $this->genererPage($data_page);
    }
    public function validation_modificationPassword($ancienPassword, $nouveauPassword, $confirmationNouveauPassword)
    {
    if ($nouveauPassword === $confirmationNouveauPassword) {
        if ($this->utilisateurManager->isCombinaisonValide($_SESSION['profil']['login'], $ancienPassword)) {
            $passwordCrypte = password_hash($nouveauPassword, PASSWORD_DEFAULT);
             if ($this->utilisateurManager->bdModificationPassword($_SESSION['profil']['login'], $passwordCrypte)) {
                Toolbox::ajouterMessageAlerte("La modification du password a été effectuée", Toolbox::COULEUR_VERTE);
                header("Location: " . URL . "compte/profil");
        } else {
            Toolbox::ajouterMessageAlerte("La modification a échouée", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "compte/modificationPassword");
        }
        } else {
            Toolbox::ajouterMessageAlerte("La combinaison login / ancien password ne correspond pas", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "compte/modificationPassword");
        }
        } else {
            Toolbox::ajouterMessageAlerte("Les passwords ne correspondent pas", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "compte/modificationPassword");
        }
    }

    public function suppressionCompte()
    {
        $this->dossierSuppressionImageUtilisateur($_SESSION['profil']['login']);
        rmdir("public/Assets/images/profils/" . $_SESSION['profil']['login']);

    if ($this->utilisateurManager->bdSuppressionCompte($_SESSION['profil']['login'])) {
        Toolbox::ajouterMessageAlerte("La suppression du compte est effectuée", Toolbox::COULEUR_VERTE);
        $this->deconnexion();
    } else {
        Toolbox::ajouterMessageAlerte("La suppression n'a pas été effectuée. Contactez l'administrateur",
        Toolbox::COULEUR_ROUGE);
        header("Location: " . URL . "compte/profil");
          }
    }

    public function validation_modificationImage($file)
        {
            try {
                $repertoire = "public/Assets/images/profils/" . $_SESSION['profil']['login'] . "/"; //TODO: Add support for png and gif 15/05/22
                $logo = imagecreatefrompng('public/Assets/images/logo.png');
                $modifiedImage = imagecreatefromjpeg($file['tmp_name']);

                $marge_right = 10;
                $marge_bottom = 10;
                $sx = imagesx($logo);
                $sy = imagesy($modifiedImage);

                // Copie le cachet sur la photo en utilisant les marges et la largeur de la
                // photo originale  afin de calculer la position du cachet 
                imagecopy($modifiedImage, $logo, imagesx($modifiedImage) - $sx - $marge_right, imagesy($modifiedImage) - $sy - $marge_bottom, 0, 0, imagesx($logo), imagesy($logo));

                $nomImage = Toolbox::ajoutImage($file, $modifiedImage, $repertoire); //ajout image dans le répertoire
                //Supression de l'ancienne image
                $this->dossierSuppressionImageUtilisateur($_SESSION['profil']['login']);
                //Ajout de la nouvelle image dans la BD
                $nomImageBD = "profils/" . $_SESSION['profil']['login'] . "/" . $nomImage;
                if ($this->utilisateurManager->bdAjoutImage($_SESSION['profil']['login'], $nomImageBD)) {
                    Toolbox::ajouterMessageAlerte("La modification de l'image est effectuée", Toolbox::COULEUR_VERTE);
                } else {
                    Toolbox::ajouterMessageAlerte("La modification de l'image n'a pas été effectuée", Toolbox::COULEUR_ROUGE);
                }
            } catch (Exception $e) {
                Toolbox::ajouterMessageAlerte($e->getMessage(), Toolbox::COULEUR_ROUGE);
            }

            header("Location: " . URL . "compte/profil");
        }

    private function dossierSuppressionImageUtilisateur($login)
    {
        $ancienneImage = $this->utilisateurManager->getImageUtilisateur($_SESSION['profil']['login']);
            if ($ancienneImage !== "profils/profil.png") {
                unlink("public/Assets/images/" . $ancienneImage);
            }
        }
        public function pageError($msg, $statusCode)
        {
        return parent::pageErreur($msg, $statusCode);
    }
    }