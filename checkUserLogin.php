<?php

function verifyUsers () {

    // Check if all fields were filled //
    if (!isset($_POST['usrname']) or !isset($_POST['pssword'])) {
        return;
    }
    
    $db = new SQLite3('/DBnW/general/miniGym.db');
    $stmt = $db->prepare('SELECT id, pwd, firstName FROM auth WHERE id=:usrname AND pwd=:pssword AND customer.status="active"');
    $stmt->bindParam(':usrname', $_POST['usrname'], SQLITE3_TEXT); // username is of type text
    $stmt->bindParam(':pssword', $_POST['pssword'], SQLITE3_TEXT); // password is of type text
    $result = $stmt->execute(); // check for existence of username and password combination, and account is active
    
    $rows_array = []; // array to store the rows collected
    
    // check for combination //
    while ($row=$result->fetchArray()) {
        $rows_array[]=$row;
    }
    
    return $rows_array;
    }

?>