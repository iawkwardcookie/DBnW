<?php require("../general/header.php");
require("../Customer/customerSQL.php");

$menuType = $_POST['pageType'] = 'manage-c';

$users = getUser();

// deleting row //
if (isset($_POST['delete'])){

    header("Location: staffDelete.php");

}

if (isset($_POST['update'])){

    header('Location: staffUpdate.php');
    
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
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Postcode</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Update</th>
                </thead>
                <?php for($i=0; $i<count($users); $i++): ?>
                <tr>
                    <td><?php echo $users[$i][0]; ?></td>
                    <td><?php echo $users[$i][1]; ?></td>
                    <td><?php echo $users[$i][2]; ?></td>
                    <td><?php echo $users[$i][3]; ?></td>
                    <td><?php echo $users[$i][4]; ?></td>
                    <td><?php echo $users[$i][5]; ?></td>
                    <td><?php echo $users[$i][6]; ?></td>
                    <td><?php echo $users[$i][7]; ?></td>
                    <td>
                    <form method="post">
                        <button type="submit" value="update" name="update"><?php $_SESSION['uid']=$i; $_SESSION['uname']=$users[$i][0]; ?> Update</button>
                        <button type="submit" value="delete" name="delete"><?php $_SESSION['uid'] = $i; $_SESSION['uname']=$users[$i][0]; ?>Delete</button>
                    </form>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>
        </div>
        
        
    </main>
</div>

<?php require("../general/footer.php");?>