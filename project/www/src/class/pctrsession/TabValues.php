<?php 

if (!class_exists('SessionClass')) {

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    abstract class SessionClass {

        private array $tab;

        /**
         * Set the value of tab
         *
         * @param array $tab
         *
         * @return self
         */
        public function setTab(array $tab): self
        {
                $this->tab = $tab;

                return $this;
        }

        /**
         * Get the value of tab
         *
         * @return array
         */
        public function getTab(): array
        {
                return $this->tab;
        }

        
    }
}