<?php require("../general/header.php");
require('customerSQL.php');

$menuType = $_POST['pageType'] = 'login';

$erroruname = $errorpostcode = $erroremail = $errorbirth = $errorpassword = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['username']==""){
        $erroruname = "Username is missing";
        $allFields = "no";
    }
    if ($_POST['postcode']==""){
        $errorpostcode = "Postcode is missing";
        $allFields = "no";
    }
    if ($_POST['email']==""){
        $erroremail = "Email is missing";
        $allFields = "no";
    }
    if ($_POST['birthmonth']==""){
        $errorbirth = "Birth month is missing";
        $allFields = "no";
    }
    if ($_POST['newpassword']==""){
        $errorpassword = "New password is missing";
        $allFields = "no";
    }

    // -------------------------------------------------- //
    if($allFields == "yes") {
        if (passwordReset())
            header('Location: customerAcc.php');
    }
}
?>


<div>
    <main>
        <h1 class="main-container">Password Reset</h1>
        <div class="form">
            <form method="post">
                
                <input type="text" placeholder="username" name="username"/>
                <span class="text-danger"><?php echo $erroruname; ?></span>

                <input type="text" placeholder="postcode" name="postcode"/>
                <span class="text-danger"><?php echo $errorpostcode; ?></span>

                <input type="email" placeholder="email" name="email"/>
                <span class="text-danger"><?php echo $erroremail; ?></span>

                <input type="int" placeholder="birth month" name="birthmonth"/>
                <span class="text-danger"><?php echo $errorbirth; ?></span>
                
                <input type="password" placeholder="new password" name="newpassword"/>
                <span class="text-danger"><?php echo $errorpassword; ?></span>

                <button type="submit" value="PasswordReset" name="submit">Reset</button>
                <a class="message" href="memberLogin.php">Back to Member login</a>
                

            </form>
        </div>
    </main>
</div>

<?php require("../general/footer.php");?>