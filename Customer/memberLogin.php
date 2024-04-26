<?php require("../general/header.php");
require('customerSQL.php');

$menuType = $_POST['pageType'] = 'login';

$errorfname = $errorlname = $errordob = $erroremail = $errorpostcode = $errorpass = $erroruname = $errorpwd = "";
$allFields = "yes";

if (isset($_POST['regSubmit'])){

    if ($_POST['fname']==""){
        $errorfname = "First name is missing";
        $allFields = "no";
    }
    if ($_POST['lname']==""){
        $errorlname = "Last name is missing";
        $allFields = "no";
    }
    if ($_POST['dob']==""){
        $errordob = "Date of birth is missing";
        $allFields = "no";
    }
    if ($_POST['eml']==""){
        $erroremail = "Email is missing";
        $allFields = "no";
    }
    if ($_POST['pstcd']==""){
        $errorpostcode = "Postcode is missing";
        $allFields = "no";
    }
    if ($_POST['pass']==""){
        $errorpass = "Password is missing";
        $allFields = "no";
    }

    // -------------------------------------------------- //
    if($allFields == "yes") {
        if (createUser())
            echo 'YAYAY';
        header('Location: ../index.php');
    }
}
if (isset($_POST['logSubmit'])){
    if ($_POST['uname'] == "") {
        $errorfname = "Username is missing";
        $allFields = "no";
    }
    if ($_POST['pwd'] == "") {
        $errorfname = "Password is missing";
        $allFields = "no";
    }

    if($allFields == "yes") {
        if (verifyUser())
            echo 'YAY';
        header('Location: ../index.php');
    }
}
?>


<div>
    <main>

        <div class="login">
            <h1 class="main-container">Member Login</h1>
            <div class="form">
                <form class="login-form" method="post">

                    <input type="text" placeholder="username" name="uname"/>
                    <span class="text-danger"><?php echo $erroruname; ?></span>

                    <input type="password" placeholder="password" name="pwd"/>
                    <span class="text-danger"><?php echo $errorpwd; ?></span>

                    <button type="submit" value="Login" name="logSubmit">login</button>
                    <a class="message" href="passwordReset.php">Forgot your password?</a><br>
                    <a class="message" href="../Staff/staffLogin.php">Staff login</a>

                </form>
            </div>
        </div>

        <!------------------------------------------------------------------>

        <div class="register">
            <h1 class="main-container">Register</h1>
            <div class="form">
                <form class="register-form" method="post">

                    <input type="text" placeholder="first name" name="fname"/>
                    <span class="text-danger"><?php echo $errorfname; ?></span>

                    <input type="text" placeholder="last name" name="lname"/>
                    <span class="text-danger"><?php echo $errorlname; ?></span>

                    <input type="date" placeholder="DOB" name="dob"/>
                    <span class="text-danger"><?php echo $errordob; ?></span>
                    
                    <input type="email" placeholder="email" name="eml"/>
                    <span class="text-danger"><?php echo $erroremail; ?></span>

                    <input type="text" placeholder="postcode" name="pstcd"/>
                    <span class="text-danger"><?php echo $errorpostcode; ?></span>

                    <input type="password" placeholder="password" name="pass"/>
                    <span class="text-danger"><?php echo $errorpass; ?></span>

                    <button type="submit" value="Register" name="regSubmit">register
                    </button>

                </form>
            </div>
        </div>

    </main>
</div>

<?php require("../general/footer.php");?>