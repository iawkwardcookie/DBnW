<?php require("../general/header.php");
require('../checkUserLogin.php'); // for logging in user
require('staffSQL.php');

$menuType = $_POST['pageType'] = 'login';

$errorusername = $errorpassword = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['uname']==""){
        $errorusername = "First name is missing";
        $allFields = "no";
    }
    if ($_POST['pwd']==""){
        $errorpassword = "Password is missing";
        $allFields = "no";
    }

    // -------------------------------------------------- //
    if($allFields == "yes") {
        if (verifyStaff())
            echo 'YAYAAYAY';
        header('Location: ../index.php');
    }
}
?>


<div>
    <main>

        <div class="login">
            <h1 class="main-container">Staff Login</h1>
            <div class="form">
                <form class="login-form" method="post">

                    <input type="text" placeholder="username" name="uname"/>
                    <span class="text-danger"><?php echo $errorusername; ?></span>

                    <input type="password" placeholder="password" name="pwd"/>
                    <span class="text-danger"><?php echo $errorpassword; ?></span>

                    <button type="submit" value="Login" name="submit">login</button>
                    <a class="message" href="../Customer/memberLogin.php">Member login</a>
                
                </form>
            </div>
        </div>

    </main>
</div>

<?php require("../general/footer.php");?>