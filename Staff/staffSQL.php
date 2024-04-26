<?php

function verifyStaff() {

    // Check if all fields were filled //
    if (!isset($_POST['uname']) or !isset($_POST['pwd'])) {
        return;
    }
    
    $db = new SQLite3('../general/miniGym.db');

    // check if active //
    $stmt = $db->prepare('SELECT id, pwd FROM auth WHERE id=:usrname AND pwd=:pssword');
    $stmt->bindParam(':usrname', $_POST['uname'], SQLITE3_TEXT); // username is of type text
    $stmt->bindParam(':pssword', $_POST['pwd'], SQLITE3_TEXT); // password is of type text
    $result = $stmt->execute(); // check for existence of username and password combination, and account is active

    if (!$result) {

        // not active, so suspended //
        $_SESSION['user'] = $_POST['uname'];
        $_SESSION['userType'] = ''; // user is customer
        $_POST['pageType'] = 'main';
        echo 'Account suspended';

        return $result;
    }

    // check if staff //
    $stmt2 = $db->prepare('SELECT id, role FROM staff WHERE id=:usrname AND role="staff"');
    $stmt2->bindParam(':usrname', $_POST['uname'], SQLITE3_TEXT); // username is of type text
    $result = $stmt2->execute(); // check username and password combination has role staff

    if (!$result) {

        // check if admin //
        //$stmt2 = $db->prepare('SELECT id, role FROM staff WHERE id=:usrname AND role="admin"');
        //$stmt2->bindParam(':usrname', $_POST['uname'], SQLITE3_TEXT); // username is of type text
        //$result = $stmt2->execute(); // check username and password combination combination has role admin

        // will be admin if active and not staff //
        $_SESSION['user'] = $_POST['uname'];
        $_SESSION['userType'] = 3; // user is admin
        $_POST['pageType'] = 'admin';
        return $result;
    }
    

    // staff //
    $_SESSION['user'] = $_POST['uname'];
    $_SESSION['userType'] = 2; // user is staff
    $_POST['pageType'] = 'staff';
    return $result;
}


function getStaff(){
    
    //The database connection
    $db = new SQLite3('../general/miniGym.db');
    
    
    $sql = "SELECT * FROM staff";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while($row = $result->fetchArray(SQLITE3_NUM)){ //I use SQLITE3_NUM because I cannot remember the table's field names!
        $staff [] = $row;
    }
    return $staff;
}


?>