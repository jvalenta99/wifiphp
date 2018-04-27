<?php
     include_once('inc/db-verbindung.php');

     if( isset($_GET['todoid']) ){
        $todoid = (int) $_GET['todoid'];
        $sql = 'delete from todos where todo_pk = '.$todoid;
        mysqli_query($db,$sql);
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
</head>
<body>
    <h1>Todo</h1>
    <a href="index.php">Todo</a> |  <a href="todoform.php">Neuer Todo</a> | <a href="user.php">User</a>  | <a href="userform.php">Neuer User</a><hr>
    <?php
        $sql = 'select todo_pk, todo_text, date_format(todo_datum,\'%d.%m.%Y\') datum, todo_prio,stat_text,user_vn,user_nn 
        from todos 
        join users on (user_fk = user_pk)
        join statis on (stat_fk = stat_pk)
        order by stat_pk, todo_prio desc, datum desc';
        $result = mysqli_query($db,$sql);
        if( mysqli_num_rows($result) > 0 ){
            echo '<table>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Status</th>
                    <th>Prio</th>
                    <th>Datum</th>
                    <th>Text</th>
                    <th>ändern</th>
                    <th>löschen</th>
                </tr>';
            while( $ds = mysqli_fetch_assoc($result) ){
                echo '<tr>
                    <td>'.$ds['user_vn'].'</td>
                    <td>'.$ds['user_nn'].'</td>
                    <td>'.$ds['stat_text'].'</td>
                    <td>'.$ds['todo_prio'].'</td>
                    <td>'.$ds['datum'].'</td>
                    <td>'.$ds['todo_text'].'</td>
                    <td><a href="todoform.php?todoid='.$ds['todo_pk'].'">ändern</a></td>
                    <td><a href="index.php?todoid='.$ds['todo_pk'].'">löschen</a></td>
                    </tr>';
            }

            echo '</table>';
        }
        else{
            echo 'Keine User gefunden';
        }
    ?>
</body>
</html>