<?php 
// verifier qu'on n'a pas deja creer la classe
if (!class_exists('SessionClass')) {
        
    include_once dirname(__FILE__) . '/TabValues.php';

    /**
     * Travailler avec la table SESSION
     * @version 1.1.0
     * @author pctronique (NAULOT ludovic)
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
         * Verifier a patir d'une valeur de clee string ou un tableau de clee en string, qu'on est bien connecte.
         *
         * @param array|string|null $tab clee string ou un tableau de clee en string
         * @return boolean retourne vrai si on est connecte
         */
        public function isConnected(array|string|null $tab = null):bool {
            if(empty($_SESSION) || empty($tab)) {
                return false;
            }
            if(strtolower(gettype($tab)) === "string") {
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
         * Recuperer les valeurs d'un tableau qui va servire a la connexion de la section.
         *
         * @param array|null $tab le tableau avec les valeurs de la connexion.
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
         * Se deconnecter de la section.
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
