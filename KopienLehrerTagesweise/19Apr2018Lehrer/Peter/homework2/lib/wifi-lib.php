<?php
    
    /**
     * Prüft, ob ein Formular geposted wurde
     *
     * @return boolean
     */
    function isSent() {
        if(count($_POST) > 0) {
            return true;
        }
        return false;

        // Kurzform: return count($_POST) > 0;
    }

    /**
     * Prüfen, ob ein Index $var in $_POST existiert
     *
     * @param [type] $var
     * @return void
     */
    function exists($var) {
        return array_key_exists($var, $_POST);
    }

    /**
     * Prüft, ob ein Post-Feld ausgefüllt wurde
     *
     * @param [mixed] $var
     * @return bool
     */
    function required($var) {
        /*  Eine Bedingung kann als Rückgabewert gesetzt werden
            Eine Bedingung ist ein sog. Ausdruck. Ein Ausdruck wird erst zuerst ausgewertet, bevor das Ergebnis des Ausdrucks weiter verwendet wird.
        */        
        if (exists($var) == true && $_POST[$var] != '') {
            return true;
        }
        return false;
    }

   /**
    * Prüft, ob der Wert einer Variablen einer Integer entspricht
    *
    * @param [mixed] $value
    * @return bool
    */
    function validate_int($value) {
        if (filter_var($value, FILTER_VALIDATE_INT) === false) {
            return false;
        }
        return true;
    }

    /**
     * Prüft, ob der Wert einer Variablen einer Mail-Adresse entspricht
     *
     * @param [mixed] $value
     * @return bool
     */
    function validate_email($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }
        return true;
    }

    /**
     * Prüft, ob der Wert einer Variablen einer Float entspricht
     *
     * @param [mixed] $value
     * @return bool
     */
    function validate_float($value) {
        if (filter_var($value, FILTER_VALIDATE_FLOAT) === false) {
            return false;
        }
        return true;
    }

    /**
     * Prüft, ob der Wert einer Variablen einer URL entspricht
     *
     * @param [mixed] $value
     * @return bool
     */
    function validate_url($value) {
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }
        return true;
    }

    /**
     * Prüft, ob der Wert einer Variablen einer Boolean entspricht
     *
     * @param [mixed] $value
     * @return bool
     */
    function validate_bool($value) {
        if (filter_var($value, FILTER_VALIDATE_BOOLEAN) === false) {
            return false;
        }
        return true;
    }

    /**
     * Prüft, ob der Wert einer Variablen vom Typ Text ist (kein HTML enthält)
     *
     * @param [mixed] $value
     * @return bool
     */
    function validate_text($value) {
        return ctype_alnum($value);
    }

    /**
     * Prüft, ob der Wert einer Variablen alphanumerische Zeichen enthält (A-Z, a-z, 0-9)
     *
     * @param [mixed] $value
     * @return bool
     */
    function validate_alnum($value) {
        return ctype_alnum($value);
    }

    /**
     * Überprüft die Länge eines Strings und vergleicht mit der minlength aus der Config-Datei
     *
     * @param [string] $value
     * @param [int] $minlength
     * @return bool
     */
    function validate_minlength($value, $minlength) {  // strlen..Länge eines Strings ermitteln, zurück kommt Integer
        if (strlen($value) >= $minlength) {
            return true;
        }
        return false;
    }

    /**
     * Überprüft die Länge eines Strings und vergleicht mit der maxlength aus der Config-Datei
     *
     * @param [string] $value
     * @param [int] $maxlength
     * @return bool
     */
    function validate_maxlength($value, $maxlength) {
        if (strlen($value) <= $maxlength) {
            return true;
        }
        return false;
    }

    /**
     * Überprüft, ob $value dem mitgegebenen Datentyp entspricht, schreibt bei Fehler in das referenzierte array $errors
     * Referenz mit &
     *
     * @param [mixed] $value
     * @param [string] $dataType
     * @param [string] $fieldName
     * @param [array] $errors
     * @return bool
     */
    function validate_dataType($value, $dataType, $fieldName, &$errors) {
        // $errors wird als Referenz mitgegeben, dh. wir haben es mit dem Original-Array zu tun. Ein Funktionsparameter wird mit & als Referenz markiert!

        switch ($dataType) {        // Alternative für if/elseif
            case 'text':
                if (!validate_text($value)) {
                    $errors[$fieldName] = 'Bitte geben Sie nur Text ein!';
                    return false;
                }
                break;              // Beendet switch
            case 'bool':
                if (!validate_bool($value)) {
                    $errors[$fieldName] = 'Bitte geben Sie nur ja oder nein ein!';
                    return false;
                }
                break;
            case 'int':
                if (!validate_int($value)) {
                    $errors[$fieldName] = 'Bitte geben Sie nur Ganzzahlen ein!';
                    return false;
                }
                break;
            case 'float':
                if (!validate_float($value)) {
                    $errors[$fieldName] = 'Bitte geben Sie nur Zahlen ein!';
                    return false;
                }
                break;
            case 'email':
                if (!validate_email($value)) {
                    $errors[$fieldName] = 'Bitte geben Sie nur eine Mail-Adresse ein!';
                    return false;
                }
                break;
        }

        return true;
    }


    function validate_pw_gleich($pw1,$pw2) {
        if ($pw1 !== $pw2) {
            return true;
        }
        return false;
    }


