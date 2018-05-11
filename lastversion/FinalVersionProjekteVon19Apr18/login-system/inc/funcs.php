<?php
function validateUser($username, $password) : bool {
    $conn = \Wifi\Utilities\DB::instance();
    
    $sql = 'SELECT username, password FROM users WHERE username=?';
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $username);

        if ($stmt->execute()) {
            // holt das Result
            $stmt->store_result();
            // Gibt es einen Datensatz im result
            if ($stmt->num_rows === 1) {
                /*
                    Vorbereitung fürs Auslesen: username und password aus Select
                    wird bei einem fetch in die angegebenen Variablen ($un, $pw) gespeichert.
                */
                $stmt->bind_result($un, $pw);
                $stmt->fetch();

                if (password_verify($password, $pw)) {
                    return true;
                }
            }           
        }
    }
    
    return false;
}

function isLoggedIn() : bool {
    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])){
        return true;
    }

    return false;
}



