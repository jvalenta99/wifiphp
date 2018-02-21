<?php

/**
 * Prüft, ob ein Formular geposted wurde
 * 
 * 
 * @return boolean
 */
function isSent(){
    if (count($_POST)>0){
        return true;
    }
    return false;


}

/**
 * Prüfen, ob ein Index $var in $_Post existiert
 * 
 * 
 */

/**
 * Prüfen---
 *
 * @param [type] $var
 * @return void
 */
function exists($var){
    return array_key_exists($var, $_POST);
}