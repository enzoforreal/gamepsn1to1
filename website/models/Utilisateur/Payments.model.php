<?php
require_once("./models/MainManager.model.php");
require_once("./models/Utilisateur/Utilisateur.model.php");



class PaymentsManager extends MainManager{


      public function createTransaction($login,$id_transaction,$from_currency,$enterred_amount,$to_currency,$amount,$status){

            $req = "INSERT INTO payments (login,id_transaction,from_currency,enterred_amount,to_currency,amount,status) VALUES(?, ?, ?, ?, ?, ?, ?);";
                  $stmt = $this->getBdd()->prepare($req);
                  $stmt->execute([
                        $login,
                        $id_transaction,
                        $from_currency,
                        $enterred_amount,
                        $to_currency,
                        $amount,
                        $status,
                  ]);

      }

      public function getTransactionById($txn_id)
      {
            $req = $this->getBdd()->prepare("SELECT * FROM payments WHERE id_transaction = ?");
            $req->execute([
                  $txn_id,
            ]);

            return $req->fetch();
      }


      public function updatePayementByTxnId($txn_id, $status)
      {
            $req = $this->getBdd()->prepare("UPDATE payments SET status = ? WHERE id_transaction = ?");
            $req->execute([
                  $status,
                  $txn_id,
            ]);
      }


      public function debug($message) {
            $req = $this->getBdd()->prepare("INSERT INTO logs_tmp (logs_message) VALUES(?)");
            $req->execute([
                  $message
            ]);
      }

      public function addMoreBalance($enterred_amount,$login){
            $req = $this->getBdd()->prepare("UPDATE utilisateur SET balance = (balance + ?) WHERE login = ?");
            $req->execute([
                  $enterred_amount,
                  $login,
            ]);
      }


      public function dbCreate_withdraw($txn_id,$login,$from_currency,$enterred_amount,$address,$to_currency,$amount,$status){
            $req = $this->getBdd()->prepare("INSERT INTO withdrawal (txn_id ,login,from_currency
             , enterred_amount , address ,to_currency,amount,status)  VALUES (?,?,?,?,?,?,?,?)");
            $req->execute([

                  $txn_id,
                  $login,
                  $from_currency,
                  $enterred_amount,
                  $address,
                  $to_currency,
                  $amount,
                  $status
            
            ]); 
      }

       public function getWithdrawById($txn_id)
      {
            $req = $this->getBdd()->prepare("SELECT * FROM withdrawal WHERE txn_id = ?");
            $req->execute([
                  $txn_id,
            ]);

            return $req->fetch();
      }

      public function updateWithdrawByTxnId($txn_id, $status)
      {
            $req = $this->getBdd()->prepare("UPDATE withdrawal SET status = ? WHERE txn_id = ?");
            $req->execute([
                  $status,
                  $txn_id,
            ]);
      }


       public function deductBalance($enterred_amount,$login){
            $req = $this->getBdd()->prepare("UPDATE utilisateur SET balance = (balance - ?) WHERE login = ?");
            $req->execute([
                  $enterred_amount,
                  $login,
            ]);
      }
}