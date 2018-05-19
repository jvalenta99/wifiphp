<?php
function validateUser($conn, $username, $password) : bool {
    $sql = 'SELECT * FROM users WHERE username=? AND password=?';
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('ss', $username, $password);
        
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows === 1) {
                return true;
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



