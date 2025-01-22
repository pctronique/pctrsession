<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('GetClass')) {
        
    include_once dirname(__FILE__) . '/TabValues.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
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
