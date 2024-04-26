<?php
function createUser(){
    
    $created = false;
    $db = new SQLite3('../general/miniGym.db');
    $sql = 'INSERT INTO customer(username, fname, lname, datebirth, email, postcode, password) VALUES (:userName, :fName, :lName, :dob, :eml, :pstcd, :pwd)';
    $stmt = $db->prepare($sql); //prepare the sql statement
    $a = (rand(0,9));
    $b = (rand(0,9));
    $uname = mb_substr($_POST['fname'],0, 3)
        . mb_substr($_POST['lname'], -2)
        .$a. $b;

    //give the values for the parameters
    $stmt->bindParam(':userName', $uname, SQLITE3_TEXT); //we use SQLITE3_TEXT for text/varchar. You can use SQLITE3_INTEGER or SQLITE3_REAL for numerical values 
    $stmt->bindParam(':fName', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lName', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':dob', $_POST['dob'], SQLITE3_TEXT);
    $stmt->bindParam(':eml', $_POST['eml'], SQLITE3_TEXT);
    $stmt->bindParam(':pstcd', $_POST['pstcd'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pass'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();

    $sql2 = 'INSERT INTO auth(id, pwd) VALUES (:userName, :pwd)';
    $stmt2 = $db->prepare($sql2);
    $stmt2->bindParam(':userName', $uname, SQLITE3_TEXT);
    $stmt2->bindParam(':pwd', $_POST['pass'], SQLITE3_TEXT);
    $stmt2->execute();

    if($stmt){
        $created = true;
    }

    $_SESSION['user'] = $uname;
    $_SESSION['userType'] = 1; // user is customer
    $_POST['pageType'] = 'customer';



    return $created;
}
function verifyUser(){

    if (!isset($_POST['uname']) or !isset($_POST['pwd'])) {
        return; // <-- return null;
    }
        
    $db = new SQLite3('../general/miniGym.db');
    $stmt = $db->prepare('SELECT username, password FROM customer WHERE username=:usrname AND password=:pass AND statuses="active"');
    $stmt->bindParam(':usrname', $_POST['uname'], SQLITE3_TEXT);
    $stmt->bindParam(':pass', $_POST['pwd'], SQLITE3_TEXT);
    $result = $stmt->execute();

    if (!$result){
        return;
    }

    $_SESSION['user'] = $_POST['uname'];
    $_SESSION['userType'] = 1;
    $_POST['pageType'] = 'customer';

    return $result;

}
function getUser(){

    //The database connection
    $db = new SQLite3('../general/miniGym.db');
    
    
    $sql = "SELECT * FROM customer";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while($row = $result->fetchArray(SQLITE3_NUM)){ //I use SQLITE3_NUM because I cannot remember the table's field names!
        $users [] = $row;
    }
    return $users;
}
function getMemberships(){
    //The database connection
    $db = new SQLite3('../general/miniGym.db');
    
    
    $sql = "SELECT * FROM memberships";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while($row = $result->fetchArray(SQLITE3_NUM)){ //I use SQLITE3_NUM because I cannot remember the table's field names!
        $memberships [] = $row;
    }
    return $memberships;
}
function passwordReset(){
    $db = new SQLite3('../general/miniGym.db');
    $sql = 'UPDATE customer SET password=:pass WHERE username=:uname AND postcode=:postcode AND email=:email';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uname', $_POST['username'], SQLITE3_TEXT);
    $stmt->bindParam(':postcode', $_POST['postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':dobmonth', $_POST['birthmonth'], SQLITE3_TEXT);
    $stmt->bindParam(':pass', $_POST['newpassword'], SQLITE3_TEXT);
    $result = $stmt->execute();

    //while($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach
        //$arrayResult [] = $row; //adding a record until end of records
    //}
    //return $arrayResult;

    if ($result) {
        // check birth month is also same //
        $stmt1 = $db->prepare('SELECT datebirth FROM customer WHERE username=:uname');
        $stmt1->bindParam(':uname', $_POST['username'], SQLITE3_TEXT);
        $result1 = $stmt1->execute();
        $date = $result1->fetchArray(SQLITE3_NUM);
        echo idate('m',strtotime($date[0]));
        if (idate('m',strtotime($date[0])) == $_POST['birthmonth']) {
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['userType'] = 1;
            $_POST['pageType'] = 'customer';
        }
    }



    return $result;
}
function addMembership(){
    $db = new SQLite3('../general/miniGym.db');
    $sql = 'INSERT INTO memberships VALUES (:uname, :mem, "Pending")';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':mem', $_POST['membership'], SQLITE3_TEXT);
    $stmt->bindParam(':uname', $_SESSION['user'], SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($result)
        $_POST['status'] = 'Pending';
    return $result;
}
