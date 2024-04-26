<?php require("../general/header.php");
require("../Customer/customerSQL.php");

$menuType = $_POST['pageType'] = 'manage-c';

$staff = getUser();


if (isset($_POST['delete'])){
    $db = new SQLite3('../General/miniGym.db');
    $stmt = "DELETE FROM staff WHERE id = :uname";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':uname', $_POST['uid'], SQLITE3_TEXT);
    $sql->execute();
    }

?>


<div>
    <main>
        <h1 class="main-container">Welcome, <?php echo $_SESSION['user']?>!</h1>
        
        <div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Level</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Update</th>
                </thead>
                <?php for($i=0; $i<count($staff); $i++): ?>
                <tr>
                    <td><?php echo $staff[$i][0]; ?></td>
                    <td><?php echo $staff[$i][1]; ?></td>
                    <td><?php echo $staff[$i][2]; ?></td>
                    <td><?php echo $staff[$i][3]; ?></td>
                    <td><?php echo $staff[$i][4]; ?></td>
                    <td><?php echo $staff[$i][5]; ?></td>
                    <td><?php $_POST['uid'] = $staff[$i][0]; ?><a href="userUpdate.php">Update</a>
                    <?php $_POST['uid'] = $staff[$i][0]; ?><a name="delete" href=""><input type="submit" value="Delete"></a>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>
        </div>
        
        
    </main>
</div>

<?php require("../general/footer.php");?>