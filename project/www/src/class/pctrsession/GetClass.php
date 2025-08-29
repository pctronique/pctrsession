<?php 
// verifier qu'on n'a pas deja creer la classe
if (!class_exists('GetClass')) {
        
    include_once dirname(__FILE__) . '/TabValues.php';

    /**
     * Travailler avec la table GET
     * @version 1.1.0
     * @author pctronique (NAULOT ludovic)
     */
    class GetClass extends TabValues {

        /**
         * le constructeur par defaut
         */
        public function __construct() {
            parent::__construct("_GET");
        }

    }
}
