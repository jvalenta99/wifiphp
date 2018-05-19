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
                        }
                 
                        $number1 = $_POST['value1'];
                        $number2 = $_POST['value2'];
                        
                        $ergebis = $number1 + $number2;
                        
                        if ( array_key_exists('value1', $_POST) == false || array_key_exists('value2', $_POST) == false ) {
                            $_POST['value1'] = 0;
                            $_POST['value2'] = 0;
                       }
                                   
                        ?>


                        <h2>Addition</h2>

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
                                    <input type="submit" value="+">
                                </div>
                                <div class="box">
                                    <label for="box3">Ergebnis</label>
                                    <textarea name="ergebnis" id="box3" cols="20" rows="2"><?php echo $number1 . " + " . $number2 . " = " . $ergebis; ?></textarea>
                                    <!-- <input id="box3" type="text" placeholder="<?php echo $number1 . " + " . $number2 . " = " . $ergebis; ?>" name="number2"> -->
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