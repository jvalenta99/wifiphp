<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Functions</title>
</head>
<body>
    <h1>Functions</h1>
    <?php
        /* 
        
        */

        function firstFunction(){
            echo 'i bins,dei Funktion';
        }

        firstFunction();

        function addieren1(){
            return 12+13;
        }

        echo 'Die Summe lautet: ' .addieren1( );

        function addieren2($zahl1, $zahl2){
            return $zahl1 + $zahl2;
        }
        echo '<br>';
        echo addieren2(12,123);

        echo '<br>';
        echo addieren2(12,45);

        echo '<br>';
        echo addieren2(12,2222);

        function subtrahieren($zahl1, $zahl2){
            return $zahl1 - $zahl2;
        }

        function multiplizieren($zahl1, $zahl2){
            return $zahl1 * $zahl2;
        }
        echo '<br>';
        echo subtrahieren(5,3);
        echo '<br>';
        echo multiplizieren(3,4);
        echo '<br>';

        function greaterThanFive($zahl1){
            if ($zahl1>5){
                return true;
            } else {
                return false;
            }
            
        }//greaterThanFive

        echo '<br>';
        var_dump(greaterThanFive(3));
        echo '<br>';
        var_dump(greaterThanFive(6));

        function isEven($nr){
            if($nr%2 == 0){
                return true;
            }
            return false;
        }

        
        echo '<br>';
        var_dump(isEven(187));
        echo '<br>';
        var_dump(isEven(186));

    ?>
    
</body>
</html>