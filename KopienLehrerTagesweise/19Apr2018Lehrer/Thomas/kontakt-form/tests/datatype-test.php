<?php
$a = 2;
$b = 2.3;
$c = "2";
$d = "Ich bin ein Text";

$br = '<br>';

// is_int prüft den Datentyp einer Variable
var_dump(is_int($a));
echo $br;
var_dump(is_int($b));
echo $br;
var_dump(is_int($c));
echo $br;
var_dump(is_int($d));
echo $br;

// Alle Einträge in $_GET/$_POST sind Strings!!!
// URL: datatype-test.php?var=2
// $e = $_GET['var']; => simuliert
// is_int ist nicht geeignet für GET/POST
$e = "2";
var_dump(is_int($e));
echo $br;
echo "=============== is_numeric =============";
echo $br;
// is_numeric, prüft ob ein Wert numerisch ist, beinhaltet aber auch float etc.
var_dump(is_numeric($a));
echo $br;
var_dump(is_numeric($b));
echo $br;
var_dump(is_numeric($c));
echo $br;
var_dump(is_numeric($d));
echo $br;

// get_type liefert den Datentyp, könnte mit if verwendet werden
echo "=============== get_type =============";
echo $br;
print_r(gettype($a));
echo $br;
print_r(gettype($b));
echo $br;
print_r(gettype($c));
echo $br;
print_r(gettype($d));
echo $br;

// filter_var ist bei integer die korrekte Lösung
echo "=============== filter_var =============";
echo $br;
var_dump( filter_var($a, FILTER_VALIDATE_INT) );
echo $br;
var_dump( filter_var($b, FILTER_VALIDATE_INT) );
echo $br;
var_dump( filter_var($c, FILTER_VALIDATE_INT) );
echo $br;
var_dump( filter_var($d, FILTER_VALIDATE_INT) );
echo $br;


