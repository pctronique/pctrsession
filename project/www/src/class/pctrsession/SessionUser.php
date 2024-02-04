<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('SessionUser')) {
        
    include_once dirname(__FILE__) . '/../../lelien-admin/src/repository/UserRepository.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class SessionUser {

        private $connected;
        private $is_error;

        /**
         * le constructeur par defaut
         */
        public function __construct(int $maxlifetime = 7200) {//10800
            $this->is_error = false;
            if(empty(session_id())) {
                try {
                    session_start();
                } catch (Exception $e) {}
            }
            if (!empty($_SESSION) && array_key_exists('maxlifetime', $_SESSION) && (time() - $_SESSION['maxlifetime'] > $maxlifetime)) {
                $this->deconnected();
            }
            if(!empty($_SESSION) && array_key_exists('lelien_id_user', $_SESSION) && array_key_exists('lelien_jeton', $_SESSION)) {

            }
            $_SESSION['maxlifetime'] = time();
            $this->connected = (!empty($_SESSION) && array_key_exists("lelien_id_user", $_SESSION) && 
            array_key_exists("lelien_id_type", $_SESSION) && 
            array_key_exists("lelien_nom", $_SESSION) && 
            array_key_exists("lelien_prenom", $_SESSION) && 
            array_key_exists("lelien_email", $_SESSION) && 
            array_key_exists("lelien_jeton", $_SESSION));
        }

        /**
         * verifier qu'on est bien admin
         */
        public function isAdmin():bool {

            return false;
        }

        /**
         * verifier qu'on est connecte
         */
        public function isConnected():bool {
            return $this->connected;
        }

        /**
         * se deconnecter
         */
        public function deconnected():self {
            return $this;
        }

    }
}
