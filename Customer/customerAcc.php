<?php require("../general/header.php");
require("customerSQL.php");

$menuType = $_POST['pageType'] = 'account';

if (isset($_POST['daymembership'])) {
    $_POST['membership'] = 'Day pass';
    addMembership();


} else if (isset($_POST['monthlymembership'])) {
    $_POST['membership'] = 'Monthly';
    addMembership();

}

?>


<div>
    <main>
        <h1 class="main-container">Welcome to your account, <?php echo $_SESSION['user']?>!</h1>
        <div class="form">
            <form class="login-form" method="post">
                <p>Your membership is <?php 
                
                if (isset($_POST['membership'])){
                    if ($_POST['membership'] != null)
                        echo $_POST['membership'];
                    else
                        echo 'none';
                } else
                    echo 'none';
                    
                
                ?></p>
                <p>
                <?php 
                
                if (isset($_POST['status'])){
                    if ($_POST['status'] != null)
                        echo $_POST['status'];
                    else
                        echo 'none';
                } else
                    echo 'none';
                ?></p>
                <button type="submit" value="Login" name="daymembership">day passes £5.50</button>
                <button type="submit" value="Login" name="monthlymembership">monthly £13.50</button>
                <a class="message" href="passwordReset.php">Reset password</a><br>
                <a class="message" href="memberLogin.php">Login with a different account</a>
            </form>
        </div>
    </main>
</div>

<?php require("../general/footer.php");?>