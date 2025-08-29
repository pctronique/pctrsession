<?php 
// verifier qu'on n'a pas deja creer la classe
if (!class_exists('TabValues')) {

    /**
     * Travailler avec une table
     * @version 1.1.0
     * @author pctronique (NAULOT ludovic)
     */
    abstract class TabValues {

        private string $nametab;

        /**
         * le constructeur par reference avec un tableau de base a entrer
         *
         * @param array $tab tableau de base
         */
        public function __construct(string|null $nametab = null) {
            $this->nametab = $nametab;
            $nametab = "_GET";
            global $$nametab;
            if(empty($$nametab)) {
                $$nametab = [];
            }
        }

        /**
         * Recupere le tableau.
         *
         * @return array Recupere le tableau.
         */
        public function getTab(): array
        {
            $nametab = strval($this->nametab);
            global $$nametab;
            if(!isset($$nametab)) {
                return [];
            }
            return $$nametab;
        }

        /**
         * Verifier l'existence d'une clef (sans tableau de clef) dans le tableau.
         *
         * @param integer|string|null $key la clef a verifier
         * @return boolean vrai si la clef a ete trouve
         */
        private function pIsKeyExist(int|string|null $key): bool {
            $nametab = $this->nametab;
            global $$nametab;
            return (isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab));
        }

        /**
         * Verifier l'existence d'une clef dans le tableau.
         * Il est possible d'entrer un tableu de clef a verifier.
         *
         * @param integer|string|array|null $key la clef a verifier
         * @return boolean vrai si la clef a ete trouve
         */
        public function isKeyExist(int|string|array|null $key): bool {
            if(!empty($key) && (strtolower(gettype($key)) == "array")) {
                $isExist = true;
                foreach ($key as $value) {
                    if($isExist) {
                        $isExist = $this->pIsKeyExist($value);
                    }
                }
                return $isExist;
            }
            return $this->pIsKeyExist($key);
        }

        /**
         * Entrer un tableau de valeur avec une clef.
         *
         * @param array|null $value tableau de valeur
         * @param integer|string|null|null $key la clef
         * @return self
         */
        public function setValueArr(array|null $value, int|string|null $key = null):self {
            $nametab = $this->nametab;
            global $$nametab;
            if(!empty($$nametab) && isset($key)) {
                $$nametab[$key] = $value;
            }
            if(!empty($$nametab)) {
                array_push($$nametab, $value);
            }
            return $this;
        }

        /**
         * Recupere un tableau de valeur a partir d'une clef
         *
         * @param integer|string|null $key la clef
         * @return array|null le tableau de valeur
         */
        public function getValueArr(int|string|null $key):array|null {
            $nametab = $this->nametab;
            global $$nametab;
            if(isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab) && (strtolower(gettype($$nametab[$key])) == "array")) {
                return $$nametab[$key];
            }
            return [];
        }

        /**
         * Entrer un nombre avec une clef.
         *
         * @param integer $value un nombre
         * @param integer|string|null|null $key la clef
         * @return self
         */
        public function setValueInt(int $value, int|string|null $key = null):self {
            $nametab = $this->nametab;
            global $$nametab;
            if(!empty($$nametab) && isset($key)) {
                $$nametab[$key] = $value;
            }
            if(!empty($$nametab)) {
                array_push($$nametab, $value);
            }
            return $this;
        }

        /**
         * Recupere un nombre a partir d'une clef
         *
         * @param integer|string|null $key la clef
         * @return integer le nombre
         */
        public function getValueInt(int|string|null $key):int {
            $nametab = $this->nametab;
            global $$nametab;
            if(isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab)) {
                return intval($$nametab[$key]);
            }
            return 0;
        }

        /**
         * Entrer un texte avec une clef.
         *
         * @param string|null $value un texte
         * @param integer|string|null|null $key la clef
         * @return self
         */
        public function setValueSt(string|null $value, int|string|null $key = null):self {
            $nametab = $this->nametab;
            global $$nametab;
            if(!empty($$nametab) && isset($key)) {
                $$nametab[$key] = $value;
            }
            if(!empty($$nametab)) {
                array_push($$nametab, $value);
            }
            return $this;
        }

        /**
         * Recupere un texte a partir d'une clef
         *
         * @param integer|string|null $key la clef
         * @return string|null le texte
         */
        public function getValueSt(int|string|null $key):string|null {
            $nametab = $this->nametab;
            global $$nametab;
            if(isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab)) {
                return strval($$nametab[$key]);
            }
            return "";
        }

        /**
         * Entrer un boolean avec une clef.
         *
         * @param boolean $value un boolean
         * @param integer|string|null|null $key la clef
         * @return self
         */
        public function setValueBl(bool $value, int|string|null $key = null):self {
            $nametab = $this->nametab;
            global $$nametab;
            if(!empty($$nametab) && isset($key)) {
                $$nametab[$key] = $value;
            }
            if(!empty($$nametab)) {
                array_push($$nametab, $value);
            }
            return $this;
        }

        /**
         * Recupere un boolean a partir d'une clef
         *
         * @param integer|string|null $key la clef
         * @return boolean le boolean
         */
        public function getValueBl(int|string|null $key):bool {
            $nametab = $this->nametab;
            global $$nametab;
            if(isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab)) {
                return boolval($$nametab[$key]);
            }
            return false;
        }

        /**
         * Entrer un nombre a virgule avec une clef.
         *
         * @param float $value un nombre a virgule
         * @param integer|string|null|null $key la clef
         * @return self
         */
        public function setValueFlt(float $value, int|string|null $key = null):self {
            $nametab = $this->nametab;
            global $$nametab;
            if(!empty($$nametab) && isset($key)) {
                $$nametab[$key] = $value;
            }
            if(!empty($$nametab)) {
                array_push($$nametab, $value);
            }
            return $this;
        }

        /**
         * Recupere un nombre a virgule a partir d'une clef
         *
         * @param integer|string|null $key la clef
         * @return float le nombre a virgule
         */
        public function getValueFlt(int|string|null $key):float {
            $nametab = $this->nametab;
            global $$nametab;
            if(isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab)) {
                return floatval($$nametab[$key]);
            }
            return 0.0;
        }
        
        /**
         * Vide le tableau en totalite
         *
         * @return self
         */
        public function delAll(): self
        {
            $nametab = strval($this->nametab);
            global $$nametab;
            $$nametab = [];
            unset($$nametab);
            return $this;
        }

        /**
         * Supprimer une clef (int ou string) et sa valeur du tableau.
         *
         * @param integer|string|null $key une clef
         * @return self
         */
        public function del(int|string|null $key): self {
            $nametab = $this->nametab;
            global $$nametab;
            if (isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab)) {
                unset($$nametab[$key]);
            }
            return $this;
        }
        
    }
}
