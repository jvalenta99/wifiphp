<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./resources/css/reset.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Roboto" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="centered">
            <header>
                <h1>Thomas</h1>
            </header>
            <div class="main_col2">
                <!-- <div class="main_nav"> -->
                <nav>
                    <span>
                        <a href="./index.php">Home</a>
                    </span>
                    <span>
                        <a href="./addition.php">Die Summe</a>
                    </span>
                    <span>
                        <a href="./four.php">Erweitert</a>
                    </span>
                </nav>
                <!--  </div> -->
                <main class="calculator">
                    <?php
                        if (empty($_POST)) {
                            $_POST['value1'] = 0;
                            $_POST['value2'] = 0;
                            $_POST['cal'] = '';
                        }

                        $number1 = $_POST['value1'];
                        $number2 = $_POST['value2'];       

                        ?>


                        <h2>Grundrechnungsarten</h2>

                        <form action="" method="post">
                            <div class="zahlen_box">
                                <div class="box">
                                    <label for="box1">Zahl 1</label>
                                    <input id="box1" type="number" value="0" name="value1">
                                </div>
                                <div class="box">
                                    <label for="box2">Zahl 2</label>
                                    <input id="box2" type="number" value="0" name="value2">
                                </div>
                            </div>
                            <div class="ergebnis">
                                <div class="box submit">
                                    <input type="submit" name="cal" value="+">
                                    <input type="submit" name="cal" value="-">
                                    <input type="submit" name="cal" value="*">
                                    <input type="submit" name="cal" value="/">
                                </div>
                                <div class="box">
                                    <label for="box3">Ergebnis</label>
                                    <?php

                switch ($_POST['cal']) {
                    case "":
                        echo "";
                        break;
                    case "+":
                        $ergebisPlus = $number1 + $number2;
                        echo '<textarea name="box3" cols="20" rows="2">' . $number1 . ' + ' . $number2 . ' = ' . $ergebisPlus .'</textarea>';
                        //echo '<input id="box3" type="text" placeholder="' . $number1 . ' + ' . $number2 . ' = ' . $ergebisPlus .'" name="' . $ergebisPlus .'">';
                        break;
                    case "-":
                        $ergebisMinus = $number1 - $number2;    
                        echo '<textarea name="box3" cols="20" rows="2">' . $number1 . ' - ' . $number2 . ' = ' . $ergebisMinus .'</textarea>';
                        //echo '<input id="box3" type="text" placeholder="' . $number1 . ' - ' . $number2 . ' = ' . $ergebisMinus .'" name="' . $ergebisMinus .'">';
                        break;
                    case "*":
                        $ergebisMultiplied = $number1 * $number2;
                        echo '<textarea name="box3" cols="20" rows="2">' . $number1 . ' * ' . $number2 . ' = ' . $ergebisMultiplied .'</textarea>';
                        //echo '<input id="box3" type="text" placeholder="' . $number1 . ' * ' . $number2 . ' = ' . $ergebisMultiplied .'" name="' . $ergebisMultiplied .'">';
                        break;
                    case "/":
                        if($number2 == 0) {
                            echo '<textarea name="box3" cols="20" rows="2">Rechnung nicht Möglich - Bitte für Zahl 2 einen anderen Wert eingeben.</textarea>';
                            //echo '<input id="box3" type="textarea" placeholder="Rechnung nicht Möglich - Bitte für Zahl 2 einen anderen Wert eingeben" name="Output">';
                            break;
                        } else {
                        $ergebisDivided = $number1 / $number2;
                        echo '<textarea name="box3" cols="20" rows="2">' . $number1 . ' / ' . $number2 . ' = ' . $ergebisDivided .'</textarea>';
                        //echo '<input id="box3" type="text" placeholder="' . $number1 . ' / ' . $number2 . ' = ' . $ergebisDivided .'" name="' . $ergebisDivided .'">';
                        break;
                    }
                    }
               

                ?>
                        </div>
                        </div>
                        </form>



                </main>
                </div>
                <footer>
                <h4>&copy; 2017<?php
                    if (date("Y") >= "2017") {
                        echo " - " . date("Y");
                        } 
                ?></h4>
                </footer>
            </div>
            <!-- div.centered -->
        </div>
        <!-- div.container -->
</body>


</html>