<?php
// print_r($_POST);
    include_once('inc/db-verbindung.php');

    $text = '';
    $prio = '';
    $todoid = '';
    $userid = '';
    $submit = 'speichern';
    $error = '';

    //::START:: Formular wurde versendet
    if(isset($_POST['text']) && isset($_POST['prio']) && isset($_POST['userid']) && isset($_POST['todoid']) ){
        if( empty($_POST['text']) ){
            $error = 'Sie habe nicht alle Pflichtfelder ausgefüllt';
        }
        else if( empty($_POST['todoid']) ){
            $text = mysqli_real_escape_string($db,$_POST['text']);
            $userid = (int) $_POST['userid'];
            $prio = (int) $_POST['prio'];

            $sql = 'insert into todos (todo_prio, todo_text,user_fk,stat_fk) values('.$prio.',"'.$text.'","'.$userid.'",1)';
            $response = mysqli_query($db,$sql);
            if(mysqli_error($db)){
                echo mysqli_error($db);
                $error = 'Daten konnten nicht gespeichert werden';
            }
            else{
                header('LOCATION: index.php'); exit();
            }
        }
        else {
            $text = mysqli_real_escape_string($db,$_POST['text']);
            $userid = (int) $_POST['userid'];
            $prio = (int) $_POST['prio'];

            $sql = 'update todos set todo_text = "'.$text.'", todo_prio ="'.$prio.'", user_fk ="'.$userid.'" WHERE todo_pk='.$todoid;
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

    else if(isset($_GET['todoid'])){
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
    <h1>Todo</h1>
    <a href="index.php">Todo</a> |  <a href="todoform.php">Neuer Todo</a> | <a href="user.php">User</a>  | <a href="userform.php">Neuer User</a><hr>
<?php
    if($error){
        echo '<p style="color:red;">'.$error.'</p>';
    }
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="text">Text:</label><input type="text" id="text" name="text" value="<?php echo $text; ?>"><br>

        <label for="prio">Prio:</label>
        <select id="prio" name="prio"> 
        <?php
            for($i=5; $i>=1; $i--){
                $selected = ( $prio==$i ) ? ' selected="selected"' : '';
                echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
            }
        ?>
        </select>
        <br>
       
        <label for="userid">Name:</label>
        <select id="userid" name="userid">
        <?php
            $sql = 'select * from users order by user_nn';
            $result = mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                while( $ds = mysqli_fetch_assoc($result) ){
                    $selected = ( $userid==$ds['user_pk']) ? ' selected="selected"' : '';
                    echo '<option value="'.$ds['user_pk'].'"'.$selected.'>'.$ds['user_vn'].' '.$ds['user_nn'].'</option>';
                }
            }
        ?>
        </select>
        <br>
        <input type="hidden" name="todoid" value="<?php echo $todoid; ?>">

        <input type="submit" value="<?php echo $submit; ?>">
    </form>
</body>
</html>