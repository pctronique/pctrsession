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
            if(empty(session_id())) {
                try {
                    session_start();
                } catch (Exception $e) {}
            }
            parent::__construct("_SESSION");
            $this->maxlifetime = -1;
            $nametab = strval("_SESSION");
            global $$nametab;
            if($maxlifetime > 0) {
                $this->maxlifetime = $maxlifetime;
            }
            if ($this->isKeyExist('maxlifetime') && (time() - $this->getValueInt('maxlifetime') > $maxlifetime)) {
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
                if(!$this->isKeyExist($value)) {
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
                //$this->setValueInt(time(), 'maxlifetime');
            }
            foreach ($tab as $key => $value) {
                $_SESSION[$key] = $value;
            }
            return $this;
        }

        /**
         * Undocumented function
         *
         * @return self
         */
        public function deconnected():self {
            $this->delAll();
            session_destroy();
            return $this;
        }

    }
}
