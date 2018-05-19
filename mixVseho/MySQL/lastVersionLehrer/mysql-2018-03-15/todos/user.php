<?php
     include_once('inc/db-verbindung.php');

     if( isset($_GET['userid']) ){
        $userid = (int) $_GET['userid'];
        $sql = 'delete from users where user_pk = '.$userid;
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
    <h1>User</h1>
    <a href="index.php">Todo</a> |  <a href="todoform.php">Neuer Todo</a> | <a href="user.php">User</a>  | <a href="userform.php">Neuer User</a><hr>
    <?php
        $sql = 'select * from users';
        $result = mysqli_query($db,$sql);
        if( mysqli_num_rows($result) > 0 ){
            echo '<table>
                <tr>
                    <th>id</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>ändern</th>
                    <th>löschen</th>
                </tr>';
            while( $ds = mysqli_fetch_assoc($result) ){
                echo '<tr>
                    <td>'.$ds['user_pk'].'</td>
                    <td>'.$ds['user_vn'].'</td>
                    <td>'.$ds['user_nn'].'</td>
                    <td><a href="userform.php?userid='.$ds['user_pk'].'">ändern</a></td>
                    <td><a href="user.php?userid='.$ds['user_pk'].'">löschen</a></td>
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