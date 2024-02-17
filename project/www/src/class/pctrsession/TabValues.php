<?php 

if (!class_exists('TabValues')) {

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    abstract class TabValues {

        private string $nametab;

        /**
         * Undocumented function
         *
         * @param array $tab
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
         * Get the value of tab
         *
         * @return array
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
         * Undocumented function
         *
         * @param integer|string|null $key
         * @return boolean
         */
        private function pIsKeyExist(int|string|null $key): bool {
            $nametab = $this->nametab;
            global $$nametab;
            return (isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab));
        }

        /**
         * Undocumented function
         *
         * @param integer|string|array|null $key
         * @return boolean
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
         * Undocumented function
         *
         * @param array|null $value
         * @param integer|string|null|null $key
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
         * Undocumented function
         *
         * @param integer|string|null $key
         * @return array|null
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
         * Undocumented function
         *
         * @param integer $value
         * @param integer|string|null|null $key
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
         * Undocumented function
         *
         * @param integer|string|null $key
         * @return integer
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
         * Undocumented function
         *
         * @param string|null $value
         * @param integer|string|null|null $key
         * @return self
         */
        public function setValueSt(string|null $value, int|string|null $key = null):self {
            $nametab = $this->nametab;
            global $$nametab;
            var_dump($$nametab);
            var_dump(isset($$nametab));
            if(!empty($$nametab) && isset($key)) {
                $$nametab[$key] = $value;
            }
            if(!empty($$nametab)) {
                array_push($$nametab, $value);
            }
            return $this;
        }

        /**
         * Undocumented function
         *
         * @param integer|string|null $key
         * @return string|null
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
         * Undocumented function
         *
         * @param boolean $value
         * @param integer|string|null|null $key
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
         * Undocumented function
         *
         * @param integer|string|null $key
         * @return boolean
         */
        public function getValueBl(int|string|null $key):bool {
            $nametab = $this->nametab;
            global $$nametab;
            if(isset($key) && !empty($$nametab) && array_key_exists($key, $$nametab)) {
                return boolval($$nametab[$key]);
            }
            return "";
        }

        /**
         * Undocumented function
         *
         * @param float $value
         * @param integer|string|null|null $key
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
         * Undocumented function
         *
         * @param integer|string|null $key
         * @return float
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
         * Undocumented function
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
         * Undocumented function
         *
         * @param integer|string|null $key
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