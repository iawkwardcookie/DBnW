<?php require("../general/header.php");
require("../Customer/customerSQL.php");

$menuType = $_POST['pageType'] = 'manage-c';

// select row for that customer //
$db = new SQLite3('../General/miniGym.db');
$sql = "SELECT * FROM customer";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uname', $_GET['uid'], SQLITE3_TEXT);
$result= $stmt->execute();

while($row = $result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

// update row //
if (isset($_POST['submit'])){

    $db = new SQLite3('../General/miniGym.db');
    $sql = "UPDATE customer SET username = :uname, fname = :fname, lname = :lname, datebirth =:dob, email =:email, postcode=:pstcd, password=:pass, statuses=:sts";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uname',$_POST['uname'], SQLITE3_TEXT);
    $stmt->bindParam(':fname',$_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname',$_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':dob',$_POST['dob'], SQLITE3_TEXT); //
    $stmt->bindParam(':email',$_POST['email'], SQLITE3_TEXT); //
    $stmt->bindParam(':pstcd',$_POST['pstcd'], SQLITE3_TEXT); //
    $stmt->bindParam(':pass',$_POST['pass'], SQLITE3_TEXT); //
    $stmt->bindParam(':sts',$_POST['sts'], SQLITE3_TEXT); //

    $stmt->execute();

    header('Location: staffManage.php');
}

echo 'aaaa';
echo $_SESSION['uid'];
echo $_SESSION['uname'];

?>


<div>
    <main>
        <div class="row">
            <div class="col-11">
                <form method="post">
                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name = "uname" value="<?php echo $arrayResult[$_SESSION['uid']][0]; ?>">
                </div>

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname" value="<?php echo $arrayResult[$_SESSION['uid']][1]; ?>">
                </div>

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname" value="<?php echo $arrayResult[$_SESSION['uid']][2]; ?>">
                </div>

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Date of Birth</label>
                        <input class="form-control" type="date" name = "dob" value="<?php echo $arrayResult[$_SESSION['uid']][3]; ?>">
                </div>

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Email</label>
                        <input class="form-control" type="email" name = "email" value="<?php echo $arrayResult[$_SESSION['uid']][4]; ?>">
                </div>

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "pstcd" value="<?php echo $arrayResult[$_SESSION['uid']][5]; ?>">
                </div>

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="password" name = "lname" value="<?php echo $arrayResult[$_SESSION['uid']][6]; ?>">
                </div>

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Status</label>
                        <input class="form-control" type="text" name = "sts" value="<?php echo $arrayResult[$_SESSION['uid']][7]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                </div>
                <div class="form-group col-md-3"><a href="staffManage.php">Back</a></div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require("../general/footer.php");?>