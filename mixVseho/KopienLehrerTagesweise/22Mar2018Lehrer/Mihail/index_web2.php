<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mihail Web 2</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Mihail</h1> 
    </header>
    <?php
    // Daten aus DB
    //$n1 = '1';
    //$n2 = '3';
    $errors = 2;
    //$message = '';

    $n1 = @$_GET['number1'];
    $n2 = @$_GET['number2'];

    $resultplu = $n1 + $n2;
    $resultmin = $n1 - $n2;
    $resultmul = $n1 * $n2;

    if ($n2 != 0) {
        $resultdiv = round($n1 / $n2, 4) ;
    }
    else {
        $resultdiv = 'Division by 0';
    }
    
    ?>

    <main>
        <h2>Calculator</h2>
        <?php
        if ($errors > 0) { 
        ?>
        <!-- Emmet: form.pure-form.pure-form-stacked -->
        <form action="" method="get" class="pure-form pure-form-stacked">
            <label for="number1">Number 1</label>
            <!-- Emmet input:text -->
            <input type="number" name="number1" id="number1">

            <label for="number2">Number 2</label>
            <!-- Emmet: input:password -->
            <input type="number" name="number2" id="number2">

            <!-- Emmet: input:submit -->
            <input type="submit" value="Calculate" class="pure-button pure-button-primary">
        </form>
        <?php 
            if ($resultplu != '' ) {
                echo "<p style=\"color: #900;\">$n1 + $n2 = <b>$resultplu</b></p>";
                echo "<p style=\"color: #009;\">$n1 - $n2 = <b>$resultmin</b></p>";
                echo "<p style=\"color: #090;\">$n1 x $n2 = <b>$resultmul</b></p>";
                echo "<p style=\"color: #909;\">$n1 / $n2 = <b>$resultdiv</b></p>";
            }
        } // if $errors ENDE ?>
    </main>

    <footer class="footer">
        <p>&copy; Mihail Kaninski. All rights reserved!</p> 
    </footer>
</body>
</html>