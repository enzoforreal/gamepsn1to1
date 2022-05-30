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
}