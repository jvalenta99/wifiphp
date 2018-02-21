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


    ?>
    
</body>
</html>