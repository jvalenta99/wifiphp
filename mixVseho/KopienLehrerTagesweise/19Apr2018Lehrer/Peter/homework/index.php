<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pepo Rechner</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Pepo</h1> 
    </header>
    <?php
   
    $zahl1 = @$_POST['number1'];
    $zahl2 = @$_POST['number2'];
    

    $plus = $zahl1 + $zahl2;
    $minus = $zahl1 - $zahl2;
    $multi = $zahl1 * $zahl2;

    if ($zahl2 != 0) {
        $divi = round($zahl1 / $zahl2, 4) ;
    }
    else {
        $divi = 'Division by 0';
    }
    
    ?>

    <main>
        <h2>Rechner</h2>
        
        <form action="" method="post" class="pure-form pure-form-stacked">
            <label for="number1">Number 1</label>
            <input type="number" name="number1" id="number1">
            <br>
            <label for="number2">Number 2</label>
            <input type="number" name="number2" id="number2">
            <br>
            <input type="radio" id="+" name="calculate" value="1">
            <label for="+"> + </label>
            <br>
            <input type="radio" id="-" name="calculate" value="2">
            <label for="-"> - </label>
            <br>
            <input type="radio" id="*" name="calculate" value="3">
            <label for="*"> * </label>
            <br>
            <input type="radio" id="/" name="calculate" value="4">
            <label for="/"> / </label>
            <br>
            <input type="submit" value="Los!" class="pure-button pure-button-primary">
            
        </form>
        <?php 
            if ($plus != '' ) {
                switch($_POST['calculate']){
                    case 1:                
                        echo "<p>$zahl1 + $zahl2 = <b>$plus</b></p>";
                    break;
                    case 2:
                        echo "<p>$zahl1 - $zahl2 = <b>$minus</b></p>";
                    break;
                    case 3:
                        echo "<p>$zahl1 x $zahl2 = <b>$multi</b></p>";
                    break;
                    case 4:
                        echo "<p>$zahl1 / $zahl2 = <b>$divi</b></p>";
                    break;
                }
            }
        ?>

    </main>

    <footer class="footer">
        <p>&copy; 2018 by Pepo. </p> 
    </footer>
</body>
</html>