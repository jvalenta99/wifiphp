<?php
// print_r($_POST);
    include_once('inc/db-verbindung.php');

    $vn = '';
    $nn = '';
    $userid = '';
    $submit = 'speichern';
    $error = '';

    //::START:: Formular wurde versendet
    if(isset($_POST['vn']) && isset($_POST['nn']) && isset($_POST['userid']) ){
        if( empty($_POST['vn']) || empty($_POST['nn']) ){
            $error = 'Sie habe nicht alle Pflichtfelder ausgefüllt';
        }
        else if( empty($_POST['userid']) ){
            $vn = mysqli_real_escape_string($db,$_POST['vn']);
            $nn = mysqli_real_escape_string($db,$_POST['nn']);

            $sql = 'insert into users (user_vn, user_nn) values("'.$vn.'","'.$nn.'")';
            $response = mysqli_query($db,$sql);
            if(mysqli_error($db)){
                $error = 'Daten konnten nicht gespeichert werden';
            }
            else{
                header('LOCATION: user.php'); exit();
            }
        }
        else {
            $vn = mysqli_real_escape_string($db,$_POST['vn']);
            $nn = mysqli_real_escape_string($db,$_POST['nn']);
            $userid = (int) $_POST['userid'];

            $sql = 'update users set user_vn = "'.$vn.'", user_nn ="'.$nn.'" WHERE user_pk='.$userid;
            $response = mysqli_query($db,$sql);
            if(mysqli_error($db)){
                $error = 'Daten konnten nicht geändert werden';
            }
            else{
                header('LOCATION: user.php'); exit();
            }
        }
    
    }
    //::END:: Formular wurde versendet

    else if(isset($_GET['userid'])){
        $userid = (int) $_GET['userid'];
        $sql = 'select user_vn, user_nn from users where user_pk = '.$userid;
        $response = mysqli_query($db,$sql);
        if(mysqli_num_rows($response) == 1 ){
            $ds = mysqli_fetch_assoc($response);
            $vn = $ds['user_vn'];
            $nn = $ds['user_nn'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User neu oder ändern</title>
</head>
<body>
    <h1>User</h1>
<?php
    if($error){
        echo '<p style="color:red;">'.$error.'</p>';
    }
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="vn">Vorname:</label><input type="text" id="vn" name="vn" value="<?php echo $vn; ?>"><br>

        <label for="nn">Nachname:</label><input type="text" id="nn" name="nn" value="<?php echo $nn; ?>"><br>

        <input type="hidden" name="userid" value="<?php echo $userid; ?>">

        <input type="submit" value="<?php echo $submit; ?>">
    </form>
</body>
</html>