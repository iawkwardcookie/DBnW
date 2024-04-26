<?php require("../general/header.php");
require("../Customer/customerSQL.php");

$menuType = $_POST['pageType'] = 'manage-c';

$memberships = getMemberships();

if (isset($_POST['delete'])){

    $db = new SQLite3('../General/miniGym.db');
    $sql = "DELETE FROM memberships WHERE username = :uname";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uname', $_POST['uname'], SQLITE3_TEXT);
    $stmt->execute();
}

?>


<div>
    <main>
        <h1 class="main-container">Welcome, <?php echo $_SESSION['user']?>!</h1>
        
        <div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>User Name</th>
                    <th>Membership Type</th>
                    <th>Pay Status</th>
                    <th>Update</th>
                </thead>
                <?php for($i=0; $i<count($memberships); $i++): ?>
                <tr>
                    <td><?php echo $memberships[$i][0]; ?></td>
                    <td><?php echo $memberships[$i][1]; ?></td>
                    <td><?php echo $memberships[$i][2]; ?></td>
                    <td>
                    <form method="post">
                        <button type="submit" value="update" name="update"><?php $_POST['uid']=$i; $_POST['uname']=$memberships[$i][0]; ?> Update</button>
                        <button type="submit" value="delete" name="delete"><?php $_POST['uid']=$i; $_POST['uname']=$memberships[$i][0]; ?>Delete</button>
                    </form>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>
        </div>
        
        
    </main>
</div>

<?php require("../general/footer.php");?>