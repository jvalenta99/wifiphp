<?php
    
    $mysqli = new mysqli('localhost', 'root', '', 'todo_tom');
    
    if($mysqli->connect_errno) {
        die('Fehler DB Verbindung: ' . $mysqli->connect_error);
    }
    
    
    if(array_key_exists('task', $_GET) && array_key_exists('kategorie', $_GET) && array_key_exists('prio', $_GET)) {
            
            $insert = $mysqli->query('INSERT INTO todo_db (`aufgabe`, `kategorie`, `prio`, `date_insert`) VALUES ("'.$_GET["task"].'","'.$_GET["kategorie"].'",'.$_GET["prio"].', NOW())');               
           
    };
    

    /* if (array_key_exists) */

    $todo = $mysqli->query('SELECT * FROM todo_db WHERE date_done IS NULL ORDER BY date_insert desc');
    $done = $mysqli->query('SELECT * FROM todo_db WHERE date_done IS NOT NULL ORDER BY date_insert desc');  
    
    /* DELETE TASK */ 

    
    foreach($_GET as $delete=>$clear){
        if("del" == substr($delete,0,3)){
            $del =  $mysqli->query('DELETE FROM todo_db WHERE id='. $clear );
        };
    };


    foreach($_GET as $checked=>$didit){
        if("check" == substr($checked,0,5)){
            $check =  $mysqli->query('UPDATE todo_db SET date_done=NOW() WHERE id='. $didit );
        };
        
    };

    
    foreach($_GET as $unchecked=>$didnot){
        if("uncheck" == substr($unchecked,0,7)){
            $uncheck =  $mysqli->query('UPDATE todo_db SET date_done=NULL WHERE id='. $didnot );
        };   
    };
     
    
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo-App</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="./resources/css/reset.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <!-- HEADER SECTION Start -->
    <header>
        <section class="logo">
            <div class="rahmen">
                <h2>Web Developer</h2>
                <h3>PHP</h3>
            </div>
        </section>

        <section class="title">
            <h1>ToDo-App</h1>
        </section>
    </header>
    <!-- HEADER SECTION End -->

    <main>
        <section class="input">
            <div class="input_box">
                <form action="">
                    <button>
                        <i class="fa fa-plus"></i>
                    </button>
                    <input type="text" name="task" id="task" value="" placeholder="Aufgabe">
                    <select name="kategorie">
                        <option value="teaglich">Täglich</option>
                        <option value="gedanken">Gedanken</option>
                        <option value="kaufen">Einkauf</option>
                    </select>
                    <fieldset id="my_radio_box">
                        <label for="eins">1</label>
                        <input type="radio" id="eins" name="prio" value="1">
                        <label for="zwei">2</label>
                        <input type="radio" id="zwei" name="prio" value="2">
                        <label class="checked" for="drei">3</label>
                        <input type="radio" id="drei" name="prio" value="3" checked>
                        <label for="vier">4</label>
                        <input type="radio" id="vier" name="prio" value="4">
                        <label for="fuenf">5</label>
                        <input type="radio" id="fuenf" name="prio" value="5">
                    </fieldset>
                </form>
            </div>
        </section>

        <section class="task">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     // Zeilenweise die Resultate auslesen
    while ($row = $todo->fetch_assoc()) {
        
        echo   '
            <form>
                <tr>
                    <td><input type="checkbox" id="check' . $row["id"] .'" name="check' . $row["id"] .'" value="'. $row["id"] .'"></td>
                    <td class="text">' .$row["aufgabe"] . '</td>
                    <td>'. $row["kategorie"] .'</td>
                    <td>' . $row["prio"] . '</td>
                    <td><input type="checkbox" id="del' . $row["id"] .'" name="del' . $row["id"] .'" value="'. $row["id"] .'"></td>
                </tr>
                '
                ;}
        echo '
                
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td><button name="check" value="1" type="submit"><i class="fa fa-check-square"></i></button></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="submit"><i class="fa fa-trash-alt"></i></button> </td>
                    </tr>
                    </form>'
        
                    ?>
                </tfoot>
            </table>
        </section>

        <section class="done">
            <table>
                <thead>
                    <tr>
                        <th><i class="fa fa-check-square"></i></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                     // Zeilenweise die Resultate auslesen
    while ($row = $done->fetch_assoc()) {
       
        echo   '
            <form>
                <tr>
                    <td><input type="checkbox" id="uncheck' . $row["id"] .'" name="uncheck' . $row["id"] .'" value="'. $row["id"] .'"></td>
                    <td class="text">' .$row["aufgabe"] . '</td>
                    <td>'. $row["kategorie"] .'</td>
                    <td>' . $row["prio"] . '</td>
                    <td><input type="checkbox" id="del' . $row["id"] .'" name="del' . $row["id"] .'" value="'. $row["id"] .'"></td>
                </tr>
                '
                ;}
        echo '
                
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td><button type="submit"><i class="fa fa-check-square"></i></button></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="submit"><i class="fa fa-trash-alt"></i></button> </td>
                    </tr>
                    </form>'
        
                    ?>
                </tfoot>
            </table>
        </section>

    </main>

    <footer>&COPY; 2108 TL</footer>
    <script src="./resources/js/todo.js"></script>
</body>

</html>