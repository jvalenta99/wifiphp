<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Forum</h1>
    </header>
    <main>

<?php
// define variables and set to empty values
$usernameErr = $emailErr = $genderErr = $passwordErr = $cpasswordErr =  "";
$username = $email = $gender = $password = $cpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Das Feld Benutzername ist verpflichtend";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^\w{5,}$/",$username)) {
      $usernameErr = "Nur Buchstaben und ganze Zahlen"; 
      if (strlen($_POST["username"]) <= '5') {
        $usernameErr = "Ihr Benutzername muss mindestens 6 Zeichen enthalten!";
    }
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Das Feld E-Mail ist verpflichtend";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "ungültige E-Mail"; 
    }
  }
    
  
  if (empty($_POST["gender"])) {
    $genderErr = "Das Feld Geschlecht ist verpflichtend";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

if (empty($_POST["username"])) {
    $userErr = "Bitte tragen Sie Benutzername ein.";
} else {
    $username = test_input($_POST["username"]);
    }
//Validates password & confirm passwords.
if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["password"])) {
    $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
} else {
     $passwordErr = "Tragen Sie ihr Passwort ein";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Anmeldeformular</h2>
<p><span class="error">* Pflichtfeld.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Benutzername: <br><input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  E-mail: <br> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  Geschlecht:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="weiblich") echo "checked";?> value="weiblich">Weiblich
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="mänlich") echo "checked";?> value="mänlich">Mänlich
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  Passwort:<br> <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Passwort bestätigen:<br> <input type="password" name="cpassword" value="<?php echo $cpassword;?>">
  <span class="error">* <?php echo $cpasswordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Anmelden">
</form>
<br>
<hr>
<?php
echo "<h2>Deine Eingabe:</h2>";
echo $username;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
?>
</main>
</body>
</html>