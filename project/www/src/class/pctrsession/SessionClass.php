<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('SessionClass')) {
        
    include_once dirname(__FILE__) . '/TabValues.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class SessionClass extends TabValues {

        private $maxlifetime;

        /**
         * le constructeur par defaut
         */
        public function __construct(int $maxlifetime = -1) {
            parent::__construct("_SESSION");
            $this->maxlifetime = -1;
            if($maxlifetime > 0) {
                $this->maxlifetime = $maxlifetime;
            }
            if(empty(session_id())) {
                try {
                    session_start();
                } catch (Exception $e) {}
            }
            if (!empty($_SESSION) && array_key_exists('maxlifetime', $_SESSION) && (time() - $_SESSION['maxlifetime'] > $maxlifetime)) {
                $this->deconnected();
            }
        }

        /**
         * Undocumented function
         *
         * @param array|string|null $tab
         * @return boolean
         */
        public function isConnected(array|string|null $tab = null):bool {
            if(empty($_SESSION) || empty($tab)) {
                return false;
            }
            if(strtolower(gettype($tab)) == "string") {
                $tab = [$tab];
            }
            foreach ($tab as $value) {
                if(!array_key_exists($value, $_SESSION)) {
                    return false;
                }
            }
            return true;
        }

        /**
         * Undocumented function
         *
         * @param array|null $tab
         * @return self
         */
        public function connected(array|null $tab = null): self {
            if(empty($tab)) {
                return $this;
            }
            if($this->maxlifetime > 0) {
                $_SESSION['maxlifetime'] = time();
            }
            foreach ($tab as $key => $value) {
                $_SESSION[$key] = $value;
            }
            return $this;
        }

        /**
         * Undocumented function
         *
         * @return array|null
         */
        public function getSession(): array|null {
            return $_SESSION;
        }

        /*public function getSession(string|null $key) {
            if(empty($_SESSION)) {
                return null;
            }
            if(!array_key_exists($key, $_SESSION)) {
                return null;
            }
            return $_SESSION[$key];
        }*/

        /**
         * Undocumented function
         *
         * @return self
         */
        public function deconnected():self {
            if(!empty($_SESSION)) {
                unset($_SESSION);
                session_unset();
            }
            session_destroy();
            return $this;
        }

    }
}
