<?php
interface iFormConfig {
    public function getConfig();
}

interface iHelper {
    public function getHelp() : array;
}

/* 
    Interfaces sind ein Vertrag, bei dem sich die Klasse verpflichtet,
    die im interface deklarierte public Methods zu implementieren.
*/
class myForm implements iFormConfig {
    public function getConfig() {
        // Json laden etc.
        return 'Json Config';
    }
}

class otherForm implements iFormConfig, iHelper {
    public function getConfig() {
        // get Config form mysql
        return 'Mysql Config';
    }

    public function getHelp() : array {
        return ['h', 'e', 'l', 'p'];
    }
}

$a = new myForm();
echo $a->getConfig();

$b = new otherForm();
echo $b->getConfig();
print_r( $b->getHelp());

?>