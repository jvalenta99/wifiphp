<?php

/**
 * Prüft, ob ein Formular geposted wurde
 *
 * @return boolean
 */
function isSent() {
    if ( count($_POST) > 0 ) {
        return true;
    }

    return false;

    // Kurzform: return count($_POST) > 0;
}

/**
 * Prüfen, ob ein Index $var in $_POST exisitiert
 *
 * @param [mixed] $var
 * @return bool
 */
function exists($var) {
    return array_key_exists($var, $_POST);
}

/**
 * Prüft, ob ein POST Feld ausgefüllt wurde
 *
 * @param [mixed] $var
 * @return bool
 */
function required($var) {
    /*
     Eine Bedingung kann als Rückgabewert gesetzt werden

     Eine Bedingung ist ein sog. Ausdruck. Ein Ausdruck wird zuerst ausgewertet, bevor
     das Ergebnis des Ausdrucks weiter verwendet wird.
     
     return exists($var) == false $_POST[$var] != '';
    */
    if ( exists($var) == true && $_POST[$var] != '' ) {
        return true;
    }

    return false;
}

/**
 * Prüft ob der Wert einer Variable einer integer entspricht
 *
 * @param [mixed] $value
 * @return bool
 */
function validate_int($value) {
    if ( filter_var($value, FILTER_VALIDATE_INT) === false ) {
        return false;
    }

    return true;
}

/**
 * Prüft ob der Wert einer Variable einer float entspricht
 *
 * @param [mixed] $value
 * @return bool
 */
function validate_float($value) {
    if ( filter_var($value, FILTER_VALIDATE_FLOAT) === false ) {
        return false;
    }

    return true;
}

/**
 * Prüft ob der Wert einer Variable einer E-Mail Adresse entspricht
 *
 * @param [mixed] $value
 * @return bool
 */
function validate_email($value) {
    if ( filter_var($value, FILTER_VALIDATE_EMAIL) === false ) {
        return false;
    }

    return true;
}

/**
 * Prüft ob der Wert einer Variable einer boolean entspricht
 *
 * @param [mixed] $value
 * @return bool
 */
function validate_bool($value) {
    if ( filter_var($value, FILTER_VALIDATE_BOOLEAN) === false ) {
        return false;
    }

    return true;
}

/**
 * Prüft, ob eine Variable vom Typ Text ist (kein HTML enthält)
 *
 * @param [mixed] $value
 * @return bool
 */
function validate_text($value) {
    // TODO: korrekte Validierung implementieren, alnum ist nur Platzhalter
    return ctype_alnum($value);
}


/**
 * Prüft, ob eine Variable alphanumerische Zeichen enthält
 *
 * @param [mixed] $value
 * @return bool
 */
function validate_alnum($value) {
    return ctype_alnum($value);
}

/**
 * Überprüft, ob $value dem mitgegebenen Datatype entspricht. Schreibt bei Fehler
 * in das referenzierte array $errors.
 *
 * @param [mixed] $value
 * @param [string] $dataType
 * @param [string] $fieldName
 * @param [array] $errors
 * @return bool
 */
function validate_dataType($value, $dataType, $fieldName, &$errors) {
    /* 
        $errors wird als Referenz mitgegeben. Das heißt, wir haben es mit dem
        Original Array zu tun. Ein Funktionsparameter wird mit & als Referenz
        markiert.
    */
    switch ($dataType) {
        case 'text':
            if (!validate_text($value)) {
                $errors[$fieldName] = 'Bitte geben Sie nur Text ein';
                return false;
            }
        break; // Beendet switch
        case 'bool':
            if (!validate_bool($value)) {
                $errors[$fieldName] = 'Bitte wählen Sie ja oder nein';
                return false;
            }
        break;
        case 'int':
            if (!validate_int($value)) {
                $errors[$fieldName] = 'Bitte geben Sie nur ganze Zahlen ein';
                return false;
            }
        break;
        case 'float':
            if (!validate_float($value)) {
                $errors[$fieldName] = 'Bitte geben Sie nur Zahlen ein';
                return false;
            }
        break;
        case 'email':
            if (!validate_email($value)) {
                $errors[$fieldName] = 'Bitte geben Sie eine gültige E-Mail Adresse ein';
                return false;
            }
        break;
    }

    return true;
}

function validate_minlength($value, $minlength) {
    if (strlen($value) >= $minlength) {
        return true;
    }

    return false;
}

function validate_maxlength($value, $maxlength) {
    if (strlen($value) <= $maxlength) {
        return true;
    }

    return false;
}